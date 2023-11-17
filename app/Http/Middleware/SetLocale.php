<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {

        if (session()->has('lang')) {
            $lang = session()->get('lang');

            App::setLocale($lang);
        }

        return $next($request);
    }
}
