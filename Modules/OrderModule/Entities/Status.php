<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\OrderModule\Entities\StatusType;

class Status extends Model
{
    protected $fillable = ["title","status_type_id"];

    public $timestamps = false;

    function orders(){
        return $this->belongsToMany(Order::class,"order_statuses","status_id","order_id");
    }

    function status_type(){
        return $this->belongsTo(StatusType::class,'status_type_id');
    }
}
