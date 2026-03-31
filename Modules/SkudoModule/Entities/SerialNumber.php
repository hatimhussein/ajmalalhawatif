<?php

namespace Modules\SkudoModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SerialNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'barcode',
        'product_name_ar',
        'product_name_en',
        'product_serial',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the formatted created date
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null;
    }

    /**
     * Scope to search by product name
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('item_number', 'like', "%{$search}%")
              ->orWhere('barcode', 'like', "%{$search}%")
              ->orWhere('product_name_ar', 'like', "%{$search}%")
              ->orWhere('product_name_en', 'like', "%{$search}%")
              ->orWhere('product_serial', 'like', "%{$search}%");
        });
    }

    /**
     * Get the insurance that uses this serial number
     */
    public function insurance()
    {
        return $this->hasOne(Insurance::class, 'serial_number_id');
    }
}
