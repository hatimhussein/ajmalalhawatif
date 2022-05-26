<?php

namespace Modules\WarrantyModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\UserModule\Repository\UserRepository;
use Modules\WarrantyModule\Entities\Insurance;
use Modules\WarrantyModule\Entities\Warranty;
use Modules\WarrantyModule\Http\Requests\WarrantyRequest;
use Modules\WarrantyModule\Http\Services\WarrantyService;
use Modules\WarrantyModule\Repository\InsuranceRepository;
use Modules\WarrantyModule\Repository\WarrantyRepository;

class WarrantyController extends Controller
{
    use ApiResponseHelper, UploaderHelper;

    /**
     * @var WarrantyRepository
     */
    private WarrantyRepository $warrantyRepository;
    /**
     * @var Collection
     */
    private Collection $configs;
    /**
     * @var ConfigRepository
     */
    private ConfigRepository $configRepository;
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    /**
     * @var WarrantyService
     */
    private WarrantyService $warrantyService;
    private InsuranceRepository $insuranceRepository;

    public function __construct(WarrantyRepository  $warrantyRepository,
                                ConfigRepository    $configRepository,
                                UserRepository      $userRepository,
                                WarrantyService     $warrantyService,
                                InsuranceRepository $insuranceRepository)
    {
        $this->warrantyRepository = $warrantyRepository;
        $this->configRepository = $configRepository;
        $this->userRepository = $userRepository;
        $this->warrantyService = $warrantyService;
        $this->insuranceRepository = $insuranceRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        $this->warrantyService->checkEnabled();

//        $warranties = $this->warrantyRepository->getUserWarranties(auth()->id(), $request->get('q'));
        $warranties = $this->warrantyRepository->getUserWarranties(auth()->id());

        $this->warrantyRepository->readUserWarranties(auth()->id());
        return view('warrantymodule::front.warranty.index', compact('warranties'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $type = $request->get('type', 'card');
        $inputs = $this->warrantyService->addCompanyInputs($this->warrantyService->getEnabledInputs($type));

        $localeFile = 'warranty';
        if ($type == 'sms') {
            $inputs = $this->warrantyService->addInsuranceNumberInput($inputs);
            $localeFile = 'sms_warranty';
        }

        $phone_codes = $this->userRepository->findAllPhoneCodes();
        return view('warrantymodule::front.warranty.create', compact('inputs', 'phone_codes', 'type', 'localeFile'));
    }

    /**
     * Store a newly created resource in storage.
     * @param WarrantyRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(WarrantyRequest $request): JsonResponse
    {
        $data = $request->validated();

        $type = $request->get('type', 'card');

        if ($type == 'sms') {
            $insurance = $this->insuranceRepository->first(['id' => $request->get('warranty_number'), 'status' => 1, 'user_id' => auth()->id()]);
            if (!$insurance || !$insurance->isUsable()) {
                throw ValidationException::withMessages(['insurance' => __('warrantymodule::warranty.insurance_not_found')]);
            }
            $data = $this->warrantyService->fillWarrantyDataByInsurance($data, $insurance);
        }

        $data = $this->warrantyService->uploadFiles($data);

        $data['user_id'] = auth()->id();
        $data['type'] = $type;

        $this->warrantyRepository->create($data);

        return $this->setCode(200)->setSuccess(__('ordermodule::order.order_success'))->send();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $warranty = $this->warrantyRepository->first(['id' => $id, 'user_id' => auth()->id()]);

        if (!$warranty) abort(404);

        return view('warrantymodule::front.warranty.show', compact('warranty'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Warranty $warranty
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function edit(Warranty $warranty)
    {
        if ($warranty->is_applicable != 2 || $warranty->user_id != auth()->id()) {
            return redirect()->route('front.warranty.index', ['type' => $warranty->type]);
        }

        $type = $warranty->type;
        $inputs = $this->warrantyService->addCompanyInputs($this->warrantyService->getEnabledInputs($type));

        $localeFile = 'warranty';
        if ($type == 'sms') {
            $inputs = $this->warrantyService->addInsuranceNumberInput($inputs);
            $localeFile = 'sms_warranty';
        }

        $phone_codes = $this->userRepository->findAllPhoneCodes();
        return view('warrantymodule::front.warranty.edit', compact('inputs', 'phone_codes', 'warranty', 'type', 'localeFile'));
    }

    /**
     * Update the specified resource in storage.
     * @param WarrantyRequest $request
     * @param Warranty $warranty
     * @return JsonResponse
     */
    public function update(Request $request, Warranty $warranty): JsonResponse
    {
        if ($warranty->is_applicable != 2 || $warranty->user_id != auth()->id()) {
            return $this->setCode(400)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        $data = $request->all();

        if ($warranty->type == 'sms') {
            $insurance = $this->insuranceRepository->first(['id' => $request->get('warranty_number'), 'status' => 1, 'user_id' => auth()->id()]);
            if (!$insurance || !$insurance->isUsable($warranty->id)) {
                throw ValidationException::withMessages(['insurance' => __('warrantymodule::warranty.insurance_not_found')]);
            }
            $data = $this->warrantyService->fillWarrantyDataByInsurance($data, $insurance);
        }

        $data = $this->warrantyService->uploadFiles($data);

        $data['phone_code_id'] = ($data['phone'] ?? false) ? $data['phone_code_id'] : null;
        $data['user_id'] = auth()->id();
        $data['seen_at'] = null;

        $warranty->update($data);

        return $this->setCode(200)->setSuccess(__('ordermodule::order.order_success'))->send();
    }


    /**
     * Remove the specified resource from storage.
     * @param Insurance $insurance
     * @return JsonResponse
     */
    public function findInsurance(Insurance $insurance): JsonResponse
    {
        if ($insurance->user_id == auth()->id() && $insurance->isUsable())
            return response()->json(['insurance' => $insurance]);
        return response()->json(['insurance' => $insurance], 404);
    }
}
