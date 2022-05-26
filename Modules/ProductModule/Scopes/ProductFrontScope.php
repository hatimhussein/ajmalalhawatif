<?php

namespace Modules\ProductModule\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProductFrontScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (!request()->is('admin/*') && !request()->is('admin')) {
            $builder->with('images', 'discounts', 'reviews');
        }

    }
}

?>
