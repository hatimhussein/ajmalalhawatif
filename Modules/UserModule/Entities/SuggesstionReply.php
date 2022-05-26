<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class SuggesstionReply extends Model
{
    protected $fillable = ['suggesstion_id','user_id','show','reply_type','reply','file'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
