<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\Product;

class Brand extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'sort_order', 'photo'];

    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->name_en : $this->name_ar;
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::Class, Product::Class, 'brand_id', 'parent_id')->withPivot(['id']);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::Class, 'brand_id');
    }


}
