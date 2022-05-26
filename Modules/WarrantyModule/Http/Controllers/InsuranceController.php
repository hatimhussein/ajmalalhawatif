<?php

namespace Modules\WarrantyModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\WarrantyModule\Entities\Insurance;
use Modules\WarrantyModule\Http\Requests\InsuranceRequest;
use Modules\WarrantyModule\Http\Services\InsuranceService;
use Modules\UserModule\Repository\UserRepository;
use Modules\WarrantyModule\Repository\InsuranceRepository;

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
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
//        $insurances = $this->insuranceService->getSearch($request->get('q'), auth()->id());
        $insurances = $this->insuranceService->getSearch(null, auth()->id());

        return view('warrantymodule::front.insurance.index', compact('insurances'))->with('search', $request->get('q'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $insurance = $this->insuranceRepository->firstOrFail(['id' => $id, 'user_id' => auth()->id()]);

        return view('warrantymodule::front.insurance.show', compact('insurance'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        $inputs = $this->insuranceService->addCompanyInputs($this->insuranceService->getEnabledConfigs());

        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('warrantymodule::front.insurance.create', compact('inputs', 'phone_codes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param InsuranceRequest $request
     * @return JsonResponse
     */
    public function store(InsuranceRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data = $this->insuranceService->uploadFiles($data);

        $data['phone_code_id'] = $data['phone'] ? $data['phone_code_id'] : null;
        $data['user_id'] = auth()->id();

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
        if ($insurance->status != 3 || $insurance->user_id != auth()->id()) {
            return redirect()->route('front.insurance.index');
        }

        $inputs = $this->insuranceService->addCompanyInputs($this->insuranceService->getEnabledConfigs());

        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('warrantymodule::front.insurance.edit', compact('inputs', 'phone_codes', 'insurance'));
    }


    /**
     * Update a resource in storage.
     * @param InsuranceRequest $request
     * @param Insurance $insurance
     * @return JsonResponse
     */
    public function update(InsuranceRequest $request, Insurance $insurance): JsonResponse
    {
        if ($insurance->status != 3 || $insurance->user_id != auth()->id()) {
            return $this->setCode(400)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        $data = $request->validated();

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
