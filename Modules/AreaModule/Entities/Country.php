<?php

namespace Modules\AreaModule\Entities;

use App;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'code'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return App::isLocale('en') ? $this->getRawOriginal('name_en') : $this->getRawOriginal('name_ar');
    }

    function governments()
    {
        return $this->hasMany(Government::class, 'country_id');
    }
}
