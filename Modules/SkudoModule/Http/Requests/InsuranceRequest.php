<?php

namespace Modules\SkudoModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Validator;
use Modules\SkudoModule\Http\Services\InsuranceService;

class InsuranceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param InsuranceService $insuranceService
     * @return array
     */
    public function rules(InsuranceService $insuranceService): array
    {
        switch ($this->method()) {
            case 'POST':
                return $insuranceService->getRules();
            default:
                return $insuranceService->getUpdateRules();
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Log only on validation failure (server-side), then proceed with default behavior.
     */
    protected function failedValidation(Validator $validator)
    {
        try {
            $req = request();
            $filesInfo = [];
            foreach (['front_image', 'device_back_image', 'back_image', 'invoice_image', 'warranty_image'] as $k) {
                if (!$req->hasFile($k)) {
                    continue;
                }
                $f = $req->file($k);
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

            Log::warning('skudo.insurance.validation_failed', [
                'ip' => $req->ip(),
                'ua' => (string) $req->userAgent(),
                'route' => optional($req->route())->getName(),
                'method' => $req->method(),
                'url' => $req->fullUrl(),
                'auth' => auth()->check(),
                'user_id' => auth()->id(),
                // Avoid leaking PII in logs
                'input_keys' => array_keys($req->except([
                    'phone', 'user_name', 'email',
                    'front_image', 'device_back_image', 'back_image', 'invoice_image', 'warranty_image',
                ])),
                'files' => $filesInfo,
                'errors' => $validator->errors()->toArray(),
                'php' => [
                    'upload_max_filesize' => ini_get('upload_max_filesize'),
                    'post_max_size' => ini_get('post_max_size'),
                    'memory_limit' => ini_get('memory_limit'),
                    'max_file_uploads' => ini_get('max_file_uploads'),
                ],
            ]);
        } catch (\Throwable $e) {
            // never break response because of logging
        }

        parent::failedValidation($validator);
    }
}
