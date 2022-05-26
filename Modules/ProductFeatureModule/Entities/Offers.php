<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Scopes\OfferFrontScope;

class Offers extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'desc_ar', 'desc_en', 'photo', 'type', 'value', 'viewed_levels', 'start_date', 'end_date'];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OfferFrontScope);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discounts', 'offer_id');
    }

}
