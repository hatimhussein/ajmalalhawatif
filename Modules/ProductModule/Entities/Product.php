<?php

namespace Modules\ProductModule\Entities;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductFeatureModule\Entities\OptionValue;
use Modules\ProductFeatureModule\Entities\Option;
use Modules\ProductModule\Scopes\ProductFrontScope;
use Modules\ProductModule\Scopes\StatusScope;
use Modules\OrderModule\Entities\OrderProduct;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['parent_id', 'product_code', 'type', 'status', 'name_ar', 'name_en',
        'product_photo', 'product_price', 'product_quantity', 'desc_ar', 'desc_en', 'brand_id',
        'length', 'width', 'height', 'length_class', 'weight', 'weight_class', 'video', 'yt_video',
        'product_price2', 'product_price3', 'product_price4', 'product_price1', 'viewed_levels', 'sort',
        'short_desc_ar', 'short_desc_en',
        'product_min_qty1', 'product_min_qty2', 'product_min_qty3', 'product_min_qty4', 'product_min_qty5',
        'product_max_qty1', 'product_max_qty2', 'product_max_qty3', 'product_max_qty4', 'product_max_qty5',
        'item_number'
    ];

    protected $appends = ['name', 'product_price', 'text'];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new StatusScope);
        static::addGlobalScope(new ProductFrontScope);

        static::restoring(function($product) {
            if ($product->combinations()->withTrashed()->count()){
                $product->combinations()->withTrashed()->restore();
            }
        });

    }

    public function getNameAttribute()
    {
        return App::isLocale('en') ? $this->getRawOriginal('name_en') : $this->getRawOriginal('name_ar');
    }

    public function getTextAttribute()
    {
        return $this->getNameAttribute();
    }

    public function getTaxFreePriceAttribute()
    {
        $product_price = $this->getRawOriginal('product_price');
        if (!request()->is('admin/*')) {
            if (auth()->check() && auth()->user()->is_merchant) {
                switch (auth()->user()->prices_level) {
                    case '1':
                        $product_price = $this->product_price1;
                        break;
                    case '2':
                        $product_price = $this->product_price2;
                        break;
                    case '3':
                        $product_price = $this->product_price3;
                        break;
                    case '4':
                        $product_price = $this->product_price4;
                        break;
                    default:
                        break;
                }
            }
        }

        return $product_price > 0 ? round($product_price, 2) : 0;
    }

    public function getProductPriceAttribute()
    {
        $product_price = $this->getTaxFreePriceAttribute();
        if (!request()->is('admin/*')) {
            $tax = app('tax_settings');
            $country_tax = $tax->country_tax;
            if (auth()->check()) {
                $country_tax = ($tax->country_id == auth()->user()->country_id) ? $tax->country_tax : $tax->other_country_tax;
            }

            if ($tax->is_active && $tax->tax_product) {
                $product_price += (($product_price * $country_tax) / 100);
            }
        }

        return $product_price > 0 ? round($product_price, 2) : 0;
    }

    function category()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    function main_option()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }

    function option()
    {
        return $this->hasMany(ProductOption::class);
    }

    function option_value()
    {
        return $this->hasMany(ProductOptionValue::class);
    }

    public function option_values()
    {
        return $this->belongsToMany(OptionValue::class, 'product_option_values');
    }

    function combinations()
    {
        return $this->hasMany(ProductCombination::class);
    }

    function images()
    {
        return $this->hasMany(ProductImage::class)->select('product_id','image');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'poduct_attributes')->withPivot('attribute_value');
    }


    function discounts()
    {
        return $this->hasMany(ProductDiscount::class, 'product_id');
    }

    function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    function inOrders()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

}
