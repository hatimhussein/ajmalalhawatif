<?php

namespace Modules\ProductModule\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class StatusScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if (!request()->is('admin/*')) {
            $level = 5;
            if (auth()->check()) {
                $level = auth()->user()->prices_level;
            }

            $builder->where('products.status', 1)->where('products.parent_id', '!=', null)->where('viewed_levels', 'LIKE', "%{$level}%");
        }

    }
}

?>
