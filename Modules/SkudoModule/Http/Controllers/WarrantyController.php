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

        // Allow search for both authenticated and guest users
        if (auth()->check()) {
            // If searching, allow access to all warranties
            if ($request->has('q') && $request->q) {
                $search = $request->q;
                $query = $this->warrantyRepository->query();
                
                $query->where(function($q) use ($search) {
                    $q->where('id', (int) $search)
                      ->orWhere('package_serial', '=', $search);
                });
                
                $warranties = $query->orderBy('created_at', 'desc')->get();
            } else {
                // If not searching, show only user's warranties
                $query = $this->warrantyRepository->query()->where('user_id', auth()->id());
                $warranties = $query->orderBy('created_at', 'desc')->get();
            }
            
            $this->warrantyRepository->readUserWarranties(auth()->id());
        } else {
            // For guests, allow searching all warranties (including those created while logged in)
            if ($request->has('q') && $request->q) {
                $search = $request->q;
                $query = $this->warrantyRepository->query();
                
                $query->where(function($q) use ($search) {
                    $q->where('id', (int) $search)
                      ->orWhere('package_serial', '=', $search);
                });
                
                $warranties = $query->orderBy('created_at', 'desc')->get();
            } else {
                $warranties = [];
            }
        }

        return view('skudomodule::front.warranty.index', compact('warranties'));
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
}
