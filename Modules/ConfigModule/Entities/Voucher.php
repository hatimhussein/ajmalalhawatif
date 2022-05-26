<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{



    protected $fillable = ['code','max_num_of_use','min_total','from','to','voucher_type','amount','status','percentage'];
}
