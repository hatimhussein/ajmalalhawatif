<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['image_ar', 'image_en', 'link'];
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return app()->isLocale('ar') ? $this->image_ar : $this->image_en;
    }
}
