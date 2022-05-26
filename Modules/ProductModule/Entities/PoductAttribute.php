<?php

namespace Modules\ProductModule\Entities;


use Illuminate\Database\Eloquent\Model;
use Modules\ProductFeatureModule\Entities\Attribute;

// use Modules\ProductModule\Entities\Product;


class PoductAttribute extends Model
{
  protected $fillable = ['product_id','attribute_id','attribute_value'];

  function product()
  {
    return $this->belongsTo(Product::class);
  }

  function products(){
      return $this->belongsToMany(Product::class,"poduct_attributes","attribute_id","product_id");
  }

  function attribute()
  {
    return $this->belongsTo(Product::class);
  }



}
