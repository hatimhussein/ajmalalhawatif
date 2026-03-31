<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\ProductModule\Entities\Product;
use Modules\WarrantyModule\Entities\Returned;

class OrderProduct extends Model
{


    protected $fillable = ["order_id", "product_id", 'combination_id', "quantity", "item_price", 'item_combination_name'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function return_requests(): HasMany
    {
        return $this->hasMany(Returned::class, 'order_product_id');
    }

}
