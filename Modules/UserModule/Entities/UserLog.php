<?php

namespace Modules\UserModule\Entities;


use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = ['user_id', 'is_merchant', 'count'];


    function user()
    {
        return $this->belongsTo(User::class);
    }

}
