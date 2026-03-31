<?php

namespace Modules\OrderModule\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductCombination;
use Modules\ProductModule\Entities\ProductDiscount;
use Modules\UserModule\Entities\User;

class Cart extends Model
{
    use Notifier;

    protected $fillable = ['product_id', 'user_id', 'item_combination', 'quantity', 'offer_price', 'offer_end_time', 'offer_send_time', 'is_sent'];

    protected $appends = ['use_offer_price'];

    function getUseOfferPriceAttribute()
    {
        return (Carbon::now()->isBetween($this->offer_send_time, $this->offer_end_time) && $this->offer_price) ? $this->offer_price : null;
    }

    function product()
    {
        return $this->belongsTo(Product::class);
    }

    function combination()
    {
        return $this->belongsTo(ProductCombination::class, 'product_id', 'product_id')->where('combination_values', $this->item_combination);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    /** don't use this without eager load the user first */
    function discounts()
    {
        return $this->hasMany(ProductDiscount::class, 'product_id', 'product_id')->orderByDesc('id');
    }
}
