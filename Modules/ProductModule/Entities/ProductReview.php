<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\UserModule\Entities\User;

class ProductReview extends Model
{
    use Notifier;

    protected $fillable = ['product_id', 'review', 'stars', 'name', 'user_id', 'seen_at'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
