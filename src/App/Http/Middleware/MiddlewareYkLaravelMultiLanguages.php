<?php

namespace Yk\LaravelMultiLanguages\App\Http\Middleware;

use Closure;
use App;
use Config;

class MiddlewareYkLaravelMultiLanguages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $languages = array_map(function ($language) {
            return $language['iso_code_639_1'];
        }, array_filter(Config::get('yk.laravel-multi-languages.languages'), function ($language) {
            return $language['enabled'];
        }));

        if (in_array($request->segment(1), $languages)) {
            App::setLocale($request->segment(1));
        }

        return $next($request);
    }
}
