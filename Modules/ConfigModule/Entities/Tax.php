<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = ['tax_shipping','tax_product','country_id','country_tax','other_country_tax','is_active'];


}
