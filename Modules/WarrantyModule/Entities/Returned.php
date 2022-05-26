<?php

namespace Modules\WarrantyModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\OrderModule\Entities\OrderProduct;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;

class Returned extends Model
{
    use Notifier;

    protected $fillable = ['user_id', 'user_address_id', 'order_product_id', 'return_reason_id', 'group_stamp', 'seen_at'];

    protected $table = 'returns';

    /**
     * @return BelongsTo
     */
    public function order_product(): BelongsTo
    {
        return $this->belongsTo(OrderProduct::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
    }

    /**
     * @return BelongsTo
     */
    public function reason(): BelongsTo
    {
        return $this->belongsTo(ReturnReason::class, 'return_reason_id');
    }
}
