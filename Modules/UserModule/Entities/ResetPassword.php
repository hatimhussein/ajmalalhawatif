<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
  protected $fillable = ['email','token','expire_in'];
}
