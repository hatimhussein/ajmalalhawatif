<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class AdvertiseSettting extends Model
{
    protected $fillable = ['name_ar','name_en','status'];
}
