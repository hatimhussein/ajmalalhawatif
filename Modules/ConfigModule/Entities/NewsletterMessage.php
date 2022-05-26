<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsletterMessage extends Model
{
    protected $fillable = ['subject', 'message', 'attachment'];
}
