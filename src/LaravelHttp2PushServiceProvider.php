<?php

namespace Souhail\LaravelHttp2Push;

use Illuminate\Support\ServiceProvider;
use mrcrmn\Http2Push\Middleware\AttachPushHeader;

class LaravelHttp2PushServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-http2-push');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-http2-push');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');


        // Registers the Blade directive.
        Blade::directive('preload', function ($arguments) {
            return "<?php echo preload($arguments, false); ?>";
        });

        // Pushes the middleware to the web group.
        $this->app['router']->pushMiddlewareToGroup('web', AttachPushHeader::class);
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-http2-push.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-http2-push'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-http2-push'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-http2-push'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-http2-push');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-http2-push', function () {
            return new LaravelHttp2Push(config('laravel-http2-push.preload'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-http2-push'];
    }
}


