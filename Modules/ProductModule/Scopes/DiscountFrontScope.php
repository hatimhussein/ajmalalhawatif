<?php

namespace Modules\ProductModule\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DiscountFrontScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if (!request()->is('*admin/*', '*admin')) {
            $builder->where('start_date', "<=", date('Y-m-d'))
                ->where('end_date', ">=", date('Y-m-d'))
                ->where(function ($q) {
                    $q->where('offer_id', 0)->orWhere('offer_id', null)->orWhereHas('offer');
                });
        }

    }
}

?>
