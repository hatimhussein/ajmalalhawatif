<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Entities\Traits\Notifier;

class Suggestion extends Model
{
    use Notifier;

    protected $fillable = ['name', 'phone', 'type', 'message', 'subject', 'complete', 'show', 'reply_type', 'generate', 'user_id', 'seen_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    function suggestionReply()
    {
        return $this->hasMany(SuggesstionReply::class, 'suggesstion_id');
    }
}
