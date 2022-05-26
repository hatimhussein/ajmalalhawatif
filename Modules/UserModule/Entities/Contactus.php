<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\CommonModule\Entities\Traits\Notifier;

class Contactus extends Model
{
    use Notifier;

    protected $fillable = ['name', 'phone', 'message', 'email', 'seen_at'];
}
