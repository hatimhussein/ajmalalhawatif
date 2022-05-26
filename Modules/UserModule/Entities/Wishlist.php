<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ProductModule\Entities\Product;

class Wishlist extends Model
{
    protected $fillable = ['user_id','product_id'];

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function product(){
       return $this->belongsTo(Product::class);
    }
}
