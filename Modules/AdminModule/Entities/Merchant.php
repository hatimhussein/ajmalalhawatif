<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\AreaModule\Entities\City;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\Government;
use Modules\AreaModule\Entities\Zone;
use Modules\OrderModule\Entities\Order;
use Modules\UserModule\Entities\Wishlist;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Merchant extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['company_name','authorized_person','email','phone','gender','status','password','account_number','prices_level','city_id','zone_id','government_id','country_id'];

    protected $hidden = [
        'password','remember_token'
    ];
    protected $guarded='merchant';

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
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


    function orders()
    {

        return $this->hasMany(Order::class);
    }


}
