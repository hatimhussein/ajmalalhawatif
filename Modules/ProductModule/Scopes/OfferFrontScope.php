<?php

namespace Modules\ProductModule\Scopes;

use DB;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OfferFrontScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (!request()->is('admin/*') && !request()->is('admin')) {
            $level = auth()->check() ? auth()->user()->prices_level : 5;
            $builder->where(DB::raw("find_in_set({$level}, `viewed_levels`)"), '!=', 0);
        }

    }
}

?>
