<?php

namespace Yk\LaravelMultiLanguages;

use Illuminate\Support\ServiceProvider;
use Config;
use Route;
use File;

class LaravelMultiLanguagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return  void
     */
    public function boot()
    {
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];

        $kernel->pushMiddleware('Yk\LaravelMultiLanguages\App\Http\Middleware\SetLocale');

        foreach (Config::get('yk.laravel-multi-languages.languages') as $key => $language) {
            Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => $key, 'as' => $key.'.'], function () {
                foreach (Config::get('yk.laravel-multi-languages.routes')  as $route) {
                    require base_path($route);    
                }
                
            });
        }

        $this->loadViewsFrom(resource_path('views/vendor/yk/laravel-multi-languages'), 'Yk\LaravelMultiLanguages');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Yk\LaravelMultiLanguages');

        $this->publishes([
            __DIR__.'/config/languages.php' => config_path('vendor/yk/laravel-multi-languages/languages.php'),
        ]);

        $this->publishes([
            __DIR__.'/config/routes.php' => config_path('vendor/yk/laravel-multi-languages/routes.php'),
        ]);
    }
    
    /**
     * Register the application services.
     *
     * @return  void
     */
    public function register()
    {
        if (File::exists(config_path('vendor/yk/laravel-multi-languages/languages.php'))) {
            $this->mergeConfigFrom(
                config_path('vendor/yk/laravel-multi-languages/languages.php'), 'yk.laravel-multi-languages.languages'
            );
        }else{
            $this->mergeConfigFrom(
                __DIR__.'/config/languages.php', 'yk.laravel-multi-languages.languages'
            );
        }

        if (File::exists(config_path('vendor/yk/laravel-multi-languages/routes.php'))) {
            $this->mergeConfigFrom(
                config_path('vendor/yk/laravel-multi-languages/routes.php'), 'yk.laravel-multi-languages.routes'
            );
        }else{
            $this->mergeConfigFrom(
                __DIR__.'/config/routes.php', 'yk.laravel-multi-languages.routes'
            );
        }
    }
}