<?php

namespace Modules\WarrantyModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\AdminModule\Entities\Admin;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\ConfigModule\Entities\Currency;
use Modules\UserModule\Entities\PhoneCode;
use Modules\UserModule\Entities\User;

class Warranty extends Model
{
    use Notifier;

    protected $fillable = [
        'user_id', 'front_image', 'back_image', 'warranty_image', 'warranty_number', 'user_notes', 'usage_date',
        'insurance_id',
        'device_name_ar', 'device_name_en', 'application_number', 'is_applicable', 'value', 'reason',
        'admin_id', 'currency_id', 'replied_at', 'seen_at',
        'company_name', 'company_account', 'user_name', 'sent_at', 'phone', 'phone_code_id',
        'dummy_text_1', 'dummy_text_2', 'dummy_text_3', 'type', 'store_reason', 'seen_at'
    ];

    protected $casts = [
        'usage_date' => 'date',
        'replied_at' => 'datetime'
    ];

    public function getAttachmentsStrAttribute(): string
    {
        return "$this->front_image,$this->back_image,$this->warranty_image";
    }

    public function getDeviceNameAttribute()
    {
        return app()->isLocale('en') ? $this->getRawOriginal('device_name_en') : $this->getRawOriginal('device_name_ar');
    }


    public function getStatusLocaleAttribute(): string
    {
        switch ($this->is_applicable) {
            case 1:
                return 'applicable';
            case 0:
                return 'not_applicable';
            default:
                return 'pending';
        }
    }

    public function insurance(): BelongsTo
    {
        return $this->belongsTo(Insurance::class);
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function phone_code(): BelongsTo
    {
        return $this->belongsTo(PhoneCode::class);
    }

}
