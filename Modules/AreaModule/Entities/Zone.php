<?php

namespace Modules\AreaModule\Entities;

use App;
use Illuminate\Database\Eloquent\Model;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;

class Zone extends Model
{
    protected $fillable = ['city_id', 'country_id', 'government_id', 'name_en', 'name_ar'];
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

    function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


    function users()
    {
        return $this->hasMany(User::class, 'zone_id');
    }

    function userAdresses()
    {
        return $this->hasMany(UserAddress::class, 'zone_id');
    }
}
