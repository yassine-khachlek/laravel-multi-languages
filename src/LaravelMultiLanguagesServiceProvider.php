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
        
        $kernel->pushMiddleware('Yk\LaravelMultiLanguages\App\Http\Middleware\MiddlewareYkLaravelMultiLanguages');

        foreach (Config::get('yk.laravel-multi-languages.languages') as $key => $language) {
            Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => $language, 'as' => $language.'.'], function () {
                require base_path('routes/web.php');
            });
        }

        $this->publishes([
            __DIR__.'/config/languages.php' => config_path('vendor/yk/laravel-multi-languages/languages.php'),
        ]);
    }
    
    /**
     * Register the application services.
     *
     * @return  void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/languages.php', 'yk.laravel-multi-languages.languages'
        );

        if (File::exists(config_path('vendor/yk/laravel-multi-languages/languages.php'))) {
            $this->mergeConfigFrom(
                config_path('vendor/yk/laravel-multi-languages/languages.php'), 'yk.laravel-multi-languages.languages'
            );
        }
    }
}