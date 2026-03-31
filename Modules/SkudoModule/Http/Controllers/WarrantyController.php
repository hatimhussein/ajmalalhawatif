<?php

namespace Modules\SkudoModule\Http\Controllers;

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
use Modules\SkudoModule\Entities\Insurance;
use Modules\SkudoModule\Entities\Warranty;
use Modules\SkudoModule\Http\Requests\WarrantyRequest;
use Modules\SkudoModule\Http\Services\WarrantyService;
use Modules\SkudoModule\Repository\InsuranceRepository;
use Modules\SkudoModule\Repository\WarrantyRepository;

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
     * @return Renderable|RedirectResponse
     */
    public function index(Request $request)
    {
        $this->warrantyService->checkEnabled();

        $search = trim((string) $request->get('q', ''));

        // Search is by phone number only (to show related claims), not by request id.
        if ($search !== '') {
            $normalized = preg_replace('/\D+/', '', $search) ?? $search;
            $phones = array_values(array_unique(array_filter([$search, $normalized], fn($v) => $v !== '')));

            $query = $this->warrantyRepository->query();
            $query->whereIn('phone', $phones);

            // If user is logged in, still allow viewing/searching by phone, but mark seen for their account.
            if (auth()->check()) {
                $this->warrantyRepository->readUserWarranties(auth()->id());
            }

            $warranties = $query->orderBy('created_at', 'desc')->get();
        } else {
            if (auth()->check()) {
                // If not searching, show only user's warranties
                $query = $this->warrantyRepository->query()->where('user_id', auth()->id());
                $warranties = $query->orderBy('created_at', 'desc')->get();
                $this->warrantyRepository->readUserWarranties(auth()->id());
            } else {
                $warranties = [];
            }
        }

        return view('skudomodule::front.warranty.index', compact('warranties'))
            ->with('search', $search);
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
        return view('skudomodule::front.warranty.create', compact('inputs', 'phone_codes', 'type', 'localeFile'));
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
            // For SMS warranty (now registration number inquiry), allow both guests and authenticated users
            $insurance = $this->insuranceRepository->first(['id' => $request->get('warranty_number')]);
            if (!$insurance) {
                throw ValidationException::withMessages(['insurance' => __('skudomodule::warranty.insurance_not_found')]);
            }
            
            // Check if insurance is usable (not expired, not used, and active)
            if (!$insurance->isUsable()) {
                if ($insurance->status == 2) {
                    throw ValidationException::withMessages(['insurance' => __('skudomodule::warranty.insurance_rejected')]);
                }
                if ($insurance->isExpired()) {
                    throw ValidationException::withMessages(['insurance' => __('skudomodule::warranty.insurance_expired')]);
                }
                if ($insurance->isUsed()) {
                    throw ValidationException::withMessages(['insurance' => __('skudomodule::warranty.insurance_used')]);
                }
                if ($insurance->status != 1) {
                    throw ValidationException::withMessages(['insurance' => __('skudomodule::warranty.insurance_not_active')]);
                }
            }
            
            $data = $this->warrantyService->fillWarrantyDataByInsurance($data, $insurance);
        }

        $data = $this->warrantyService->uploadFiles($data);

        // Set user_id to null for guests, authenticated user id for logged in users
        $data['user_id'] = auth()->check() ? auth()->id() : null;
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
        // For authenticated users, only show their warranties
        // For guests, show any warranty (including those created while logged in previously)
        if (auth()->check()) {
            $warranty = $this->warrantyRepository->first(['id' => $id, 'user_id' => auth()->id()]);
        } else {
            $warranty = $this->warrantyRepository->first(['id' => $id]);
        }

        if (!$warranty) abort(404);

        return view('skudomodule::front.warranty.show', compact('warranty'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Warranty $warranty
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function edit(Warranty $warranty)
    {
        // Only authenticated users can edit warranties
        if (!auth()->check()) {
            return redirect()->route('front.skudo.warranty.new');
        }

        if ($warranty->is_applicable != 2 || $warranty->user_id != auth()->id()) {
            return redirect()->route('front.skudo.warranty.index', ['type' => $warranty->type]);
        }

        $type = $warranty->type;
        $inputs = $this->warrantyService->addCompanyInputs($this->warrantyService->getEnabledInputs($type));

        $localeFile = 'warranty';
        if ($type == 'sms') {
            $inputs = $this->warrantyService->addInsuranceNumberInput($inputs);
            $localeFile = 'sms_warranty';
        }

        $phone_codes = $this->userRepository->findAllPhoneCodes();
        return view('skudomodule::front.warranty.edit', compact('inputs', 'phone_codes', 'warranty', 'type', 'localeFile'));
    }

    /**
     * Update the specified resource in storage.
     * @param WarrantyRequest $request
     * @param Warranty $warranty
     * @return JsonResponse
     */
    public function update(Request $request, Warranty $warranty): JsonResponse
    {
        // Only authenticated users can update warranties
        if (!auth()->check()) {
            return $this->setCode(401)
                ->setSuccess(__('skudomodule::warranty.login_required'))->send();
        }

        if ($warranty->is_applicable != 2 || $warranty->user_id != auth()->id()) {
            return $this->setCode(400)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        $data = $request->all();

        if ($warranty->type == 'sms') {
            $insurance = $this->insuranceRepository->first(['id' => $request->get('warranty_number'), 'status' => 1]);
            if (!$insurance || !$insurance->isUsable($warranty->id)) {
                throw ValidationException::withMessages(['insurance' => __('skudomodule::warranty.insurance_not_found')]);
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
        // Return insurance data for inquiry regardless of status; existence ensured by route model binding
        // Only exclude rejected insurances (status = 2)
        if ($insurance->status == 2) {
            return response()->json(['error' => __('skudomodule::warranty.insurance_rejected')], 404);
        }
        
        return response()->json(['insurance' => $insurance]);
    }

    /**
     * Find insurances by phone (to avoid guessing registration id).
     * Used by warranty create (sms) to let user pick from multiple insurances.
     */
    public function findInsurancesByPhone(Request $request): JsonResponse
    {
        $phone = trim((string)$request->get('phone', ''));
        if ($phone === '') {
            return response()->json(['insurances' => []]);
        }

        // Normalize to digits-only as well
        $normalized = preg_replace('/\D+/', '', $phone) ?? '';
        $phones = array_values(array_unique(array_filter([$phone, $normalized], fn($v) => $v !== '')));

        $insurances = $this->insuranceRepository->query()
            ->with(['phone_code'])
            ->where('status', '!=', 2) // exclude rejected
            ->whereIn('phone', $phones)
            ->orderByDesc('created_at')
            ->limit(20)
            ->get();

        $payload = $insurances->map(function (Insurance $insurance) {
            return [
                'id' => $insurance->id,
                'user_name' => $insurance->user_name,
                'phone' => $insurance->phone,
                'phone_code_id' => $insurance->phone_code_id,
                'phone_code' => [
                    'code' => $insurance->phone_code->code ?? null,
                ],
                'device_serial' => $insurance->device_serial,
                'package_serial' => $insurance->package_serial,
                'usage_date' => $insurance->usage_date,
                'created_at' => $insurance->created_at,
                'front_image' => $insurance->front_image,
                'device_back_image' => $insurance->device_back_image,
                'back_image' => $insurance->back_image,
                'invoice_image' => $insurance->invoice_image,
                'status' => $insurance->status,
                'expire_date' => $insurance->expire_date,
                'is_closed' => $insurance->isClosed(),
                'store_reason' => $insurance->store_reason,
                'reason' => $insurance->reason,
            ];
        })->values();

        return response()->json(['insurances' => $payload]);
    }
}
