<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
  protected $fillable = ['email'];
}
