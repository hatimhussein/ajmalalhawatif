<?php

namespace Modules\ProductFeatureModule\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProductModule\Entities\Product;


use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
  protected $fillable = ['option_id','name_ar','name_en','value'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    function option()
  {
    return $this->belongsTo(Option::class);
  }

  function products(){
      return $this->belongsToMany(Product::class,"product_option_values","option_value_id","product_id");
  }


}
