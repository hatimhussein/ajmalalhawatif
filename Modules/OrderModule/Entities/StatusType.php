<?php

namespace Modules\OrderModule\Entities;

use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{
    protected $table = "status_types";
    protected $fillable = ['type'];
    public $timestamps = true;
}
