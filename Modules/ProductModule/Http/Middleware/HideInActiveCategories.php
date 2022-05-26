<?php

namespace Modules\ProductModule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\ProductModule\Entities\Category;

use Illuminate\Database\Eloquent\Builder;

class HideInActiveCategories
{

     public function handle($request, Closure $next, $guard = null)
      {
          Category::addGlobalScope('status', function(Builder $builder) {
              $builder->where('status', '=', 1);
          });

          return $next($request);
      }

}
