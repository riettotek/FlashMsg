<?php

namespace Riettotek\FlashMsg\Providers;

use Illuminate\Support\ServiceProvider;
use Riettotek\FlashMsg\FlashMsg;

class FlashMsgServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'../views/components', 'flashmsg');
        Blade::component('flashmsg', FlashMsg::class);

        $this->publishes([
            __DIR__ . '/../../config/flashmsg.php' => config_path('flashmsg.php'),
        ], 'config');

        // $this->publishes([
        //     __DIR__ . '/../views/components/flashmsg.php' => resource_path('views/components/flashmsg.blade.php'),
        // ], 'view');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(FlashMsg::class, function () {
            return new FlashMsg();
        });

        $this->mergeConfigFrom(__DIR__ . '/../../config/flashmsg.php', 'flashmsg');
    }
}