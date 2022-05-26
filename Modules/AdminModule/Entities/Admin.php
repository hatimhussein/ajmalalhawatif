<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\UserModule\Entities\PhoneCode;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'orders_zones', 'order_type', 'status_levels', 'phone', 'phone_code_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    public function routeNotificationForSms($notification)
    {
        return str_replace(' ', '', ltrim($this->code->code ?? '', '+') . ltrim($this->phone, '0'));
    }

    public function code(): BelongsTo
    {
        return $this->belongsTo(PhoneCode::class, 'phone_code_id');
    }
}
