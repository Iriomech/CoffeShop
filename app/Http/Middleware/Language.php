<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->server('HTTP_ACCEPT_LANGUAGE');
        if (strpos($locale, 'en') == 0) {
            $locale = 'en';
        } else {
            $locale = 'es';
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
