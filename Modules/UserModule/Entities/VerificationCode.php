<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $fillable = ['email','code','expire_in'];
}
