<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'payment_method', 'amount', 'currency_id',
        'payload', 'invoice_id', 'invoice_data', 'status', 'txn_id', 'processed_at'
    ];

    protected $casts = [
        'payload' => 'array',
        'invoice_data' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($transaction) {
            $transaction->{$transaction->getKeyName()} = Str::orderedUuid()->toString();
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }

}
