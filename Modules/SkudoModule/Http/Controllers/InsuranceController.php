<?php

namespace Modules\SkudoModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\SkudoModule\Entities\Insurance;
use Modules\SkudoModule\Http\Requests\InsuranceRequest;
use Modules\SkudoModule\Http\Services\InsuranceService;
use Modules\UserModule\Repository\UserRepository;
use Modules\SkudoModule\Repository\InsuranceRepository;

class InsuranceController extends Controller
{
    use ApiResponseHelper;


    private InsuranceService $insuranceService;
    private UserRepository $userRepository;
    private InsuranceRepository $insuranceRepository;

    public function __construct(InsuranceRepository $insuranceRepository,
                                InsuranceService    $insuranceService,
                                UserRepository      $userRepository)
    {
        $this->insuranceRepository = $insuranceRepository;
        $this->insuranceService = $insuranceService;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable|RedirectResponse
     */
    public function index(Request $request)
    {
        // Page accessible to everyone; only show results when searching
        $search = $request->get('q');
        $userId = auth()->check() ? auth()->id() : null;

        $insurances = collect();
        if ($search) {
            $insurances = $this->insuranceService->getSearch($search, $userId);
        }

        return view('skudomodule::front.insurance.index', compact('insurances'))
            ->with('search', $search);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        // For guests, only show insurances without user_id
        $query = ['id' => $id];
//        if (auth()->check()) {
//            $query['user_id'] = auth()->id();
//        } else {
//            $query['user_id'] = null;
//        }

        $insurance = $this->insuranceRepository->firstOrFail($query);

        return view('skudomodule::front.insurance.show', compact('insurance'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        $inputs = $this->insuranceService->addCompanyInputs($this->insuranceService->getEnabledConfigs());

        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('skudomodule::front.insurance.create', compact('inputs', 'phone_codes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param InsuranceRequest $request
     * @return JsonResponse
     */
    public function store(InsuranceRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Persist serials even if not part of enabled config validation
        foreach (['device_serial', 'package_serial'] as $k) {
            if ($request->filled($k)) {
                $data[$k] = $request->input($k);
            }
        }

        // Ensure back_image is persisted even if not part of enabled config
        if ($request->hasFile('back_image')) {
            $data['back_image'] = $request->file('back_image');
        }

        $data = $this->insuranceService->uploadFiles($data);

        $data['phone_code_id'] = $data['phone'] ? $data['phone_code_id'] : null;
        // Set user_id to null for guests, authenticated user id for logged in users
        $data['user_id'] = auth()->check() ? auth()->id() : null;

        $this->insuranceRepository->create($data);

        return $this->setCode(200)
            ->setSuccess(__('ordermodule::order.order_success'))->send();
    }


    /**
     * Show the form for edit a resource.
     * @param Insurance $insurance
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Insurance $insurance)
    {
        // Only authenticated users can edit insurances
        if (!auth()->check()) {
            return redirect()->route('front.skudo.insurance.create');
        }

        if ($insurance->status != 3 || $insurance->user_id != auth()->id()) {
            return redirect()->route('front.skudo.insurance.index');
        }

        $inputs = $this->insuranceService->addCompanyInputs($this->insuranceService->getEnabledConfigs());

        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('skudomodule::front.insurance.edit', compact('inputs', 'phone_codes', 'insurance'));
    }


    /**
     * Update a resource in storage.
     * @param InsuranceRequest $request
     * @param Insurance $insurance
     * @return JsonResponse
     */
    public function update(InsuranceRequest $request, Insurance $insurance): JsonResponse
    {
        // Only authenticated users can update insurances
        if (!auth()->check()) {
            return $this->setCode(401)
                ->setSuccess(__('skudomodule::insurance.login_required'))->send();
        }

        if ($insurance->status != 3 || $insurance->user_id != auth()->id()) {
            return $this->setCode(400)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        $data = $request->validated();

        foreach (['device_serial', 'package_serial'] as $k) {
            if ($request->filled($k)) {
                $data[$k] = $request->input($k);
            }
        }

        if ($request->hasFile('back_image')) {
            $data['back_image'] = $request->file('back_image');
        }

        $data = $this->insuranceService->uploadFiles($data);

        $data['phone_code_id'] = $data['phone'] ? $data['phone_code_id'] : null;
        $data['user_id'] = auth()->id();
        $data['seen_at'] = null;
        $data['client_update'] = now();

        $insurance->update($data);

        return $this->setCode(200)
            ->setSuccess(__('ordermodule::order.order_success'))->send();
    }

}
