<?php

namespace Modules\SkudoModule\Entities;

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

    protected $table = 'skudo_warranties';

    protected $fillable = [
        'user_id', 'front_image', 'back_image', 'warranty_image', 'warranty_number', 'user_notes', 'usage_date',
        'insurance_id',
        'device_name_ar', 'device_name_en', 'application_number', 'is_applicable', 'value', 'reason',
        'admin_id', 'currency_id', 'replied_at', 'seen_at',
        'company_name', 'company_account', 'user_name', 'sent_at', 'phone', 'phone_code_id',
        'dummy_text_1', 'dummy_text_2', 'dummy_text_3', 'type', 'store_reason', 'seen_at',
        'device_serial', 'package_serial', 'broken_device_image',
        'bank_name', 'account_holder_name', 'bank_account_number', 'iban_number',
        'transfer_status', 'transfer_receipt'
    ];

    protected $casts = [
        'usage_date' => 'date',
        'replied_at' => 'datetime'
    ];

    public function getAttachmentsStrAttribute(): string
    {
        $attachments = [];
        
        // إضافة صورة الجهاز المكسور
        if ($this->broken_device_image) {
            $attachments[] = $this->broken_device_image;
        }
        
        // إضافة صور من insurance إذا كانت موجودة
        if ($this->insurance) {
            if ($this->insurance->front_image) {
                $attachments[] = $this->insurance->front_image;
            }
            if ($this->insurance->back_image) {
                $attachments[] = $this->insurance->back_image;
            }
        }
        
        // إضافة الصور الأخرى من warranty نفسه
        if ($this->front_image) {
            $attachments[] = $this->front_image;
        }
        if ($this->back_image) {
            $attachments[] = $this->back_image;
        }
        if ($this->warranty_image) {
            $attachments[] = $this->warranty_image;
        }
        
        return implode(',', $attachments);
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
