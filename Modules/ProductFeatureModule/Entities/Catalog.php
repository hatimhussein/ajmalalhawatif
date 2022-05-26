<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catalog extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'desc_en', 'desc_ar', 'file', 'viewed_levels', 'catalog_category_id', 'brand_id'];

    protected $appends = ['name', 'desc', 'file_path', 'is_image', 'is_video'];

    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->name_en : $this->name_ar;
    }

    public function getDescAttribute()
    {
        return app()->isLocale('en') ? $this->desc_en : $this->desc_ar;
    }

    public function getIsImageAttribute(): bool
    {
        return is_image($this->file);
    }

    public function getIsVideoAttribute(): bool
    {
        return is_video($this->file);
    }

    public function getFilePathAttribute(): string
    {
        return asset('files/catalog/' . $this->getRawOriginal('file'));
    }

    public function getViewedLevelsAttribute($viewed_levels)
    {
        return explode(',', $viewed_levels);
    }

    public function setViewedLevelsAttribute($viewed_levels)
    {
        $this->attributes['viewed_levels'] = (is_array($viewed_levels)) ? implode(',', $viewed_levels) : $viewed_levels;
    }

    public function CatalogCategory(): BelongsTo
    {
        return $this->belongsTo(CatalogCategory::class, 'catalog_category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
