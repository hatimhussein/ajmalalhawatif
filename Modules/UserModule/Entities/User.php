<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Modules\AreaModule\Entities\City;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\Zone;
use Modules\AreaModule\Entities\Government;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\OrderModule\Entities\Cart;
use Modules\UserModule\Entities\Wishlist;
use Modules\OrderModule\Entities\Order;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\UserModule\Entities\Contactus;
use Modules\WarrantyModule\Entities\Warranty;


class User extends Authenticatable
{
    use Notifiable, Notifier;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'phone_code_id', 'gender', 'birth_date', 'user_status', 'has_forward_account'
        , 'password', 'city_id', 'zone_id', 'government_id', 'country_id', 'is_active', 'company_name', 'authorized_person',
        'is_merchant', 'account_number', 'prices_level', 'commercial_register', 'tax_number', 'logo', 'can_cash', 'seen_at',
        'bank_transfer'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    public function routeNotificationForSms($notification)
    {
        return str_replace(' ', '', ltrim($this->code->code ?? '', '+') . ltrim($this->phone, '0'));
    }

    public function getNameAttribute()
    {
        return $this->is_merchant ? $this->company_name : trim($this->first_name . ' ' . $this->last_name);
    }

    function code()
    {
        return $this->belongsTo(PhoneCode::class, 'phone_code_id');
    }

    function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    function suggestion()
    {
        return $this->hasMany(Suggestion::class, 'user_id');
    }


    function country()
    {
        return $this->belongsTo(Country::class);
    }

    function government()
    {
        return $this->belongsTo(Government::class, 'government_id', 'id');
    }


    function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id', 'id');
    }


    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    function orders(): HasMany
    {

        return $this->hasMany(Order::class);
    }

    /**
     * @return HasMany
     */
    function userlog(): HasMany
    {
        return $this->hasMany(UserLog::class);
    }

    /**
     * @return HasMany
     */
    function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * @return HasOne
     */
    function phoneVerification(): HasOne
    {
        return $this->hasOne(VerificationCode::class, 'email', 'phone');
    }

    public function warranties(): HasMany
    {
        return $this->hasMany(Warranty::class, 'user_id');
    }

}
