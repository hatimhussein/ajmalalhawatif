<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['url','author','name_ar','name_en','desc_ar','desc_en','keys_en','keys_ar','script_header','script_footer'];
}
