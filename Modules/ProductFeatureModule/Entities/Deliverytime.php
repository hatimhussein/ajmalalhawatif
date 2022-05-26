<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\OrderModule\Entities\Order;


class Deliverytime extends Model
{
    protected $fillable = ['deliverytime_ar', 'deliverytime_en', 'sort_order', 'for_user', 'for_merchant'];


    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->deliverytime_en : $this->deliverytime_ar;
    }


    /**
     * @return HasMany
     */
    function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'delivery_time');
    }


}
