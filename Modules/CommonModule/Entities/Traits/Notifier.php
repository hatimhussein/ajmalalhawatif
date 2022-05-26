<?php

namespace Modules\CommonModule\Entities\Traits;

trait Notifier
{

    public function scopeSeen($query)
    {
        $query->where('seen_at', '!=', null);
    }

    public function scopeUnSeen($query)
    {
        $query->where('seen_at', null);
    }
}
