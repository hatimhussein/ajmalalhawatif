<?php

namespace Modules\UserModule\Entities;

use Modules\AreaModule\Entities\City;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\Zone;
use Modules\AreaModule\Entities\Government;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = ['country_id', 'government_id', 'city_id', 'zone_id', 'address'];


    function user()
    {
        return $this->belongsTo(User::class);
    }

    function getCountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function getGovernment()
    {
        return $this->belongsTo(Government::class, 'government_id');
    }


    function getZone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }


    function getCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
