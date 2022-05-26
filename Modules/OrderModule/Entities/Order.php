<?php

namespace Modules\OrderModule\Entities;

use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;
use Modules\ProductModule\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\Currency;
use Modules\OrderModule\Scopes\OrderScope;
use Modules\ProductFeatureModule\Entities\Deliverytime;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use Notifier, SoftDeletes;

    protected $fillable = [
        'user_id', 'user_address_id', 'payment_type', 'sub_total', 'discount',
        'shipping', 'total', 'delivery_time', 'comment', 'coupon_code',
        'current_status_id', 'current_status_type_id', 'is_merchant', 'prices_level',
        'order_currency', 'currency_id', 'currency_value', 'send_gift', 'gift_cost', 'currency_id',
        'tax_percentage', 'assigned_ids', 'last_modifier_id', 'transaction_id', 'completed_at', 'untaxed_shipping',
        'seen_at'
    ];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OrderScope);
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id')->where('quantity', '>', 0);
    }


    function products()
    {
        return $this->belongsToMany(Product::class, "order_products", "order_id", "product_id")->withPivot('quantity', 'item_price', 'combination_id', 'item_combination_name');
    }


    function userAddresses()
    {
        return $this->belongsTo(UserAddress::class, "user_address_id");
    }


    function orderStatus()
    {
        return $this->hasMany(OrderStatus::class, 'order_id');
    }


    function currentStatus()
    {
        return $this->belongsTo(Status::class, "current_status_id", "id");
    }

    function status()
    {
        return $this->belongsToMany(Status::class, "order_statuses", "order_id", "status_id")
            ->withTimestamps()->withPivot("status_comment")->orderBy('id', 'desc');
    }

    function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    function deliverytime()
    {
        return $this->belongsTo(Deliverytime::class, 'delivery_time');
    }

    function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
