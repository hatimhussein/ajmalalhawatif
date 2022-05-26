<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneCode extends Model
{
    protected $fillable = [];

    protected $appends = ['text'];

    public function getTextAttribute(): string
    {
        return $this->iso . ' ' . $this->code;
    }

    function orders()
    {
        return $this->hasMany(User::class, 'phone_code_id');
    }
}
