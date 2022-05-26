<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCombination extends Model
{
    protected $fillable = ['product_id','combination','combination_quantity','combination_price','options_ids','combination_values','combination_names'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    function product()
    {
      return $this->belongsTo(Product::class);
    }
}
