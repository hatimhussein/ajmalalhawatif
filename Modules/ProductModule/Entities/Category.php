<?php

namespace Modules\ProductModule\Entities;

use Modules\ProductFeatureModule\Entities\Option;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Scopes\CategoryFrontScope;

class Category extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'desc_ar', 'desc_en', 'desc_en', 'status', 'parent_id', 'photo', 'banner', 'sort_order'];

    protected $appends = ['banner'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CategoryFrontScope);
    }

    function getBannerAttribute()
    {
        return $this->getRawOriginal('banner') ?? $this->getRawOriginal('photo');

    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'parent_id', 'id');
    }

    function directproducts()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    function options()
    {
        return $this->belongsToMany(Option::class, 'category_options');
    }


    function brands()
    {
        return $this->belongsToMany(Brand::Class, Product::Class, 'parent_id', 'brand_id')
            ->withPivot(['id']);
    }

    public function products_new()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

}
