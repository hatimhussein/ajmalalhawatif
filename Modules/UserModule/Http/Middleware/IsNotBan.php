<?php

namespace Modules\UserModule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class IsNotBan
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if(Auth::user() && Auth::user()->is_ban)
      {
          Auth::logout();
          return redirect('/login');
      }

        return $next($request);
    }
}
