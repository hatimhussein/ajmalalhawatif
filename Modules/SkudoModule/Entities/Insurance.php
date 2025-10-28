<?php

namespace Modules\SkudoModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\AdminModule\Entities\Admin;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\UserModule\Entities\PhoneCode;
use Modules\UserModule\Entities\User;

class Insurance extends Model
{
    use HasFactory, Notifier;

    protected $table = 'skudo_insurances';

    protected $fillable = [
        'user_name', 'email', 'phone_code_id', 'phone', 'usage_date', 'dummy_text_1', 'dummy_text_2', 'dummy_text_3',
        'device_serial', 'package_serial', 'serial_number_id',
        'front_image', 'back_image', 'invoice_image', 'warranty_image', 'user_notes', 'user_id',
        'replied_at', 'expire_date', 'admin_id', 'status', 'reason', 'store_reason', 'seen_at','client_update','updated_at'
    ];

    protected $casts = [
        'usage_date' => 'date',
        'replied_at' => 'datetime',
        'expire_date' => 'datetime',
        'client_update' => 'datetime'
    ];

    public function getAttachmentsStrAttribute(): string
    {
        return "$this->front_image,$this->back_image,$this->invoice_image,$this->warranty_image";
    }

    public function getUserAttribute(): User
    {

        return $this->attributes['user'] ?? (new User())->fill([
                'first_name' => $this->user_name,
                'email' => $this->email,
                'phone_code_id' => $this->phone_code_id,
                'phone' => $this->phone,
                'is_merchant' => 0
            ]);
    }


    public function getStatusLocaleAttribute(): string
    {
        switch ($this->status) {
            case 1:
                return 'activated';
            case 2:
                return 'rejected';
            default:
                return 'pending';
        }
    }


    public function phone_code(): BelongsTo
    {
        return $this->belongsTo(PhoneCode::class);
    }

    public function serialNumber(): BelongsTo
    {
        return $this->belongsTo(SerialNumber::class);
    }


    public function merchant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function warranties(): HasMany
    {
        return $this->hasMany(Warranty::class);
    }


    public function getRespondedWarranty($id = null)
    {
        $query = $this->relationLoaded('warranties')
            ? $this->warranties
            : $this->warranties();

        if ($id) {
            $query = $query->where('id', '!=', $id);
        }

        return $query->where('replied_at', '!=', null);
    }

    public function isUsed($id = null): bool
    {
        return (bool)$this->getRespondedWarranty($id)->first();
    }

    public function isFinalUsed($id = null): bool
    {
        $query = $this->getRespondedWarranty($id);

        if (is_a($query, HasMany::class)) {
            $query = $this->getRespondedWarranty($id)
                ->where('is_applicable', '!=', null);
        } else {
            $query = $this->getRespondedWarranty($id)
                ->whereNotNull('is_applicable');
        }

        return (bool)$query->first();
    }

    public function isExpired(): bool
    {
        return $this->expire_date ? $this->expire_date->isPast() : false;
    }

    public function isUsable($id = null): bool
    {
        return (!($this->isUsed($id) || $this->isExpired()) && $this->status == 1);
    }

    public function isClosed($id = null): bool
    {
        return $this->isFinalUsed($id) || $this->isExpired();
    }
}
