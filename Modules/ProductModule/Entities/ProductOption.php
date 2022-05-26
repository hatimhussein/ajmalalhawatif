<?php

namespace Modules\ProductModule\Entities;
use Modules\ProductFeatureModule\OptionValue;
use Modules\ProductFeatureModule\Entities\Option;


use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = ['product_id','option_id'];

    function product()
    {
      return $this->belongsTo(Product::class);
    }

    function values()
    {
      return $this->belongsTo(OptionValue::class);
    }

    function mainOption()
    {
      return $this->belongsTo(Option::class);
    }


}
