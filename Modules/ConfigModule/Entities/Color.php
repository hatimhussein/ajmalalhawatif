<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['key','color'];
}
