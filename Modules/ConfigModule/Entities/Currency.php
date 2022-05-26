<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\OrderModule\Entities\Order;

class Currency extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'code', 'symbol', 'status'];

    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->getRawOriginal('name_en') : $this->getRawOriginal('name_ar');
    }


    function orders()
    {
        return $this->hasMany(Order::class, 'currency_id');
    }

}
