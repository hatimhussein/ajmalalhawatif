<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['desc_ar', 'desc_en', 'status', 'viewed_levels'];

    public function getViewedLevelsAttribute($viewed_levels)
    {
        return explode(',', $viewed_levels);
    }

    public function setViewedLevelsAttribute($viewed_levels)
    {
        $this->attributes['viewed_levels'] = (is_array($viewed_levels)) ? implode(',', $viewed_levels) : $viewed_levels;
    }
}
