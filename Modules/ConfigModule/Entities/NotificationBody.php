<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class NotificationBody extends Model
{
    protected $fillable = ['desc_ar', 'desc_en', 'send_sms'];

    public function getReplacementsAttribute($replacements)
    {
        return explode(',', $replacements);
    }

    public function getReplacementsTextAttribute()
    {
        $text = '';
        foreach ($this->replacements as $var) {
            $text .= $var . ' => ' . __('configmodule::notification.' . $var) . '<br>';
        }
        return $text;
    }
}
