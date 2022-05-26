<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['image'];

    function product()
    {
      return $this->belongsTo(Product::class,'product_id');
    }

}
