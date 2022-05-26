<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    protected $fillable = ['sort', 'status'];
}
