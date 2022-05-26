<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ["order_id","status_id",'status_type_id',"status_comment"];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
