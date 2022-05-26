<?php

namespace Modules\ConfigModule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\ConfigModule\Entities\Currency;
use Session;


class AppCurrency
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
        if (!Session::has('currency')) {
            $currency = Currency::where('is_deafult', 1)->first();
            session(['currency' => $currency]);
        } else {
            $currency = Session::get('currency');
            $currency = Currency::where('id', $currency->id)->first();
            session(['currency' => $currency]);
        }

        return $next($request);
    }
}
