<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
  protected $fillable = ['name_ar','name_en','type'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    function optionValues()
    {
        return $this->hasMany(OptionValue::class);
    }

}
