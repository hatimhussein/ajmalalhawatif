<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductFeatureModule\Entities\OptionValue;

class ProductOptionValue extends Model
{
    protected $fillable = ['product_id','option_value_id'];

    function product()
    {
      return $this->belongsTo(Product::class);
    }

    function option_vals()
    {
      return $this->belongsTo(OptionValue::class,'option_value_id');
    }



}
