<?php

namespace Modules\ProductFeatureModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductModule\Entities\Product;

class Attribute extends Model
{
      protected $fillable = ['name_ar','name_en'];

      public function products()
      {
          return $this->belongsToMany(Product::class, 'poduct_attributes');
      }

}
