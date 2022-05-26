<?php

namespace Modules\ProductModule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\ProductModule\Entities\Product;

use Illuminate\Database\Eloquent\Builder;

class HideInActiveProduct
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
     public function handle($request, Closure $next, $guard = null)
      {
          Product::addGlobalScope('status', function(Builder $builder) {
              $builder->where('status', '=', 1);
          });

          return $next($request);
      }

}
