<?php

namespace Modules\SkudoModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    private function logInsuranceRequest(string $stage, Request $request, array $extra = []): void
    {
        try {
            $filesInfo = [];
            foreach (['front_image', 'device_back_image', 'back_image', 'invoice_image', 'warranty_image'] as $k) {
                if (!$request->hasFile($k)) {
                    continue;
                }
                $f = $request->file($k);
                if (!$f) {
                    continue;
                }
                $filesInfo[$k] = [
                    'original' => method_exists($f, 'getClientOriginalName') ? $f->getClientOriginalName() : null,
                    'ext' => method_exists($f, 'getClientOriginalExtension') ? $f->getClientOriginalExtension() : null,
                    'mime' => method_exists($f, 'getClientMimeType') ? $f->getClientMimeType() : null,
                    'size' => method_exists($f, 'getSize') ? $f->getSize() : null,
                ];
            }

            Log::info('skudo.insurance.' . $stage, array_merge([
                'ip' => $request->ip(),
                'ua' => (string) $request->userAgent(),
                'route' => optional($request->route())->getName(),
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'auth' => auth()->check(),
                'user_id' => auth()->id(),
                // Only log keys to avoid leaking PII in logs
                'input_keys' => array_keys($request->except([
                    'phone', 'user_name', 'email',
                    'front_image', 'device_back_image', 'back_image', 'invoice_image', 'warranty_image',
                ])),
                'has_phone' => $request->filled('phone'),
                'has_phone_code_id' => $request->filled('phone_code_id'),
                'has_package_serial' => $request->filled('package_serial'),
                'has_device_serial' => $request->filled('device_serial'),
                'files' => $filesInfo,
                'php' => [
                    'upload_max_filesize' => ini_get('upload_max_filesize'),
                    'post_max_size' => ini_get('post_max_size'),
                    'memory_limit' => ini_get('memory_limit'),
                    'max_file_uploads' => ini_get('max_file_uploads'),
                ],
            ], $extra));
        } catch (\Throwable $e) {
            // Never break request because of logging.
        }
    }


    /** @var InsuranceService */
    private $insuranceService;
    /** @var UserRepository */
    private $userRepository;
    /** @var InsuranceRepository */
    private $insuranceRepository;

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
        // SECURITY: prevent guessing insurance id to view other clients.
        // - Auth users can view only their own insurance by id.
        // - Guests must provide matching phone number (query param) for their guest insurance.

        $q = $this->insuranceRepository->query()->where('id', $id);

        if (auth()->check()) {
            $q->where('user_id', auth()->id());
        } else {
            $q->whereNull('user_id');

            $phoneKeyword = trim((string) request()->get('phone', request()->get('q', '')));
            if ($phoneKeyword === '') {
                abort(404);
            }

            $insurance = $q->first();
            if (!$insurance) {
                abort(404);
            }

            $needle = preg_replace('/\D+/', '', $phoneKeyword) ?? $phoneKeyword;
            $hay = preg_replace('/\D+/', '', (string) $insurance->phone) ?? (string) $insurance->phone;
            if ($needle === '' || $hay === '' || $needle !== $hay) {
                abort(404);
            }

            return view('skudomodule::front.insurance.show', compact('insurance'));
        }

        $insurance = $q->firstOrFail();

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

        // إضافة serial_number_id إذا كان موجود
        if ($request->filled('serial_number_id')) {
            $data['serial_number_id'] = $request->input('serial_number_id');
        }

        // Ensure back_image is persisted even if not part of enabled config
        if ($request->hasFile('back_image')) {
            $data['back_image'] = $request->file('back_image');
        }

        // Ensure device_back_image is persisted even if not part of enabled config
        if ($request->hasFile('device_back_image')) {
            $data['device_back_image'] = $request->file('device_back_image');
        }

        // Ensure invoice_image is persisted even if not part of enabled config
        if ($request->hasFile('invoice_image')) {
            $data['invoice_image'] = $request->file('invoice_image');
        }

        try {
            $data = $this->insuranceService->uploadFiles($data);
        } catch (\Throwable $e) {
            $this->logInsuranceRequest('store.exception', $request, [
                'error' => $e->getMessage(),
                'class' => get_class($e),
            ]);
            return $this->setCode(500)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        $data['phone_code_id'] = $data['phone'] ? $data['phone_code_id'] : null;
        // Set user_id to null for guests, authenticated user id for logged in users
        $data['user_id'] = auth()->check() ? auth()->id() : null;

        try {
            $insurance = $this->insuranceRepository->create($data);
        } catch (\Throwable $e) {
            $this->logInsuranceRequest('store.exception', $request, [
                'error' => $e->getMessage(),
                'class' => get_class($e),
            ]);
            return $this->setCode(500)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        return $this->setCode(200)
            ->setData(['phone' => $data['phone'] ?? null])
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

        if ($request->hasFile('device_back_image')) {
            $data['device_back_image'] = $request->file('device_back_image');
        }

        if ($request->hasFile('invoice_image')) {
            $data['invoice_image'] = $request->file('invoice_image');
        }

        try {
            $data = $this->insuranceService->uploadFiles($data);
        } catch (\Throwable $e) {
            $this->logInsuranceRequest('update.exception', $request, [
                'insurance_id' => $insurance->id,
                'error' => $e->getMessage(),
                'class' => get_class($e),
            ]);
            return $this->setCode(500)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        $data['phone_code_id'] = $data['phone'] ? $data['phone_code_id'] : null;
        $data['user_id'] = auth()->id();
        $data['seen_at'] = null;
        $data['client_update'] = now();

        try {
            $insurance->update($data);
        } catch (\Throwable $e) {
            $this->logInsuranceRequest('update.exception', $request, [
                'insurance_id' => $insurance->id,
                'error' => $e->getMessage(),
                'class' => get_class($e),
            ]);
            return $this->setCode(500)
                ->setSuccess(__('commonmodule::validation.error'))->send();
        }

        return $this->setCode(200)
            ->setSuccess(__('ordermodule::order.order_success'))->send();
    }

}
