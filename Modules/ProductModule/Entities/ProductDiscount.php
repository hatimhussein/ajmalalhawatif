<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductFeatureModule\Entities\Offers;
use Modules\ProductModule\Scopes\DiscountFrontScope;

class ProductDiscount extends Model
{
    protected $fillable = ['product_id', 'discount_type', 'discount_value'
        , 'discount_quantity', 'start_date', 'end_date', 'offer_id'];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new DiscountFrontScope);
    }

    function product()
    {
        return $this->belongsTo(Product::class);
    }

    function offer()
    {
        return $this->belongsTo(Offers::class);
    }
}
