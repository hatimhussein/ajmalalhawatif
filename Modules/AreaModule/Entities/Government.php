<?php

namespace Modules\AreaModule\Entities;

use App;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'country_id'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return App::isLocale('en') ? $this->getRawOriginal('name_en') : $this->getRawOriginal('name_ar');
    }

    function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function cities()
    {
        return $this->hasMany(City::class, 'government_id');
    }

    function users()
    {
        return $this->hasMany(User::class, 'government_id');
    }

    function userAdresses()
    {
        return $this->hasMany(UserAddress::class, 'government_id');
    }


}
