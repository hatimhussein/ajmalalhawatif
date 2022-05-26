<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryOption extends Model
{
    protected $fillable = ['category_id','option_id'];
}
