<?php

namespace Modules\AreaModule\Entities;

use App;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['country_id', 'government_id', 'name_en', 'name_ar', 'shipping_price'];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return App::isLocale('en') ? $this->getRawOriginal('name_en') : $this->getRawOriginal('name_ar');
    }

    function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function government()
    {
        return $this->belongsTo(Government::class, 'government_id');
    }


    function zones()
    {
        return $this->hasMany(Zone::class, 'city_id');
    }


    function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }

    function userAdresses()
    {
        return $this->hasMany(UserAddress::class, 'city_id');
    }


}
