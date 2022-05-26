<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'image', 'parent_id'];


    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->name_en : $this->name_ar;
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(CatalogCategory::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(CatalogCategory::class, 'parent_id');
    }
}
