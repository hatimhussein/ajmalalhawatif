<?php

namespace Modules\UserModule\Http\Middleware;
use Modules\UserModule\Repository\UserRepository;

use Closure;
use Illuminate\Http\Request;
use Auth;
class IsActivate
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
        if(!Auth::user()->is_active){
            $userRepository= new UserRepository();
            $userRepository->sendRegisterMail(Auth::user()->email);
            return redirect('/activation');

        }
        else if((Auth::user()->last_name == null || Auth::user()->phone == null ||
            Auth::user()->city_id == null || Auth::user()->zone_id == null ||
                Auth::user()->government_id == null
        )&& Auth::user()->is_merchant == 0)
        {
            return redirect('/account-information');

        }
        else
        {
            return $next($request);
        }

    }
}
