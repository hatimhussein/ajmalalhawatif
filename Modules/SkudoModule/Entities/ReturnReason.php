<?php

namespace Modules\SkudoModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ReturnReason extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'view_for'];

    protected $table = 'skudo_return_reasons';

    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->getRawOriginal('name_en') : $this->getRawOriginal('name_ar');
    }

    public function getViewForAttribute()
    {
        return explode(',', $this->getRawOriginal('view_for'));
    }

    public function setViewForAttribute($value)
    {
        $this->attributes['view_for'] = (is_array($value)) ? implode(',', $value) : ($value ?? '');
    }
}
