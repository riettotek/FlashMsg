<?php

namespace Riettotek\FlashMsg\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Riettotek\FlashMsg\FlashMsg;
use Riettotek\FlashMsg\RenderAlerts;


class FlashMsgServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        
        Blade::component('renderalerts', RenderAlerts::class);
        Blade::directive('alertsmsg', function() {$this->eof();});

        $this->publishes([
            __DIR__ . '/../../config/flashmsg.php' => config_path('flashmsg.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../view/component/alertsmsg.blade.php' => resource_path('views/components/alertsmsg.blade.php'),
        ], 'view');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(FlashMsg::class, function () {
            View::share('alertmsgs', FlashMsg::messages());
            return new FlashMsg();
        });
        $this->mergeConfigFrom(__DIR__ . '/../../config/flashmsg.php', 'flashmsg');
    }

    private function eof()
    {
        return '<?php if(!empty($flashmsg = FlashMsg::messages())){ 
            echo config("flashmsg.wrapper.prefix");
            foreach($flashmsg as $m){ 
            echo "<li class=\"".$m["bg"]."\">";
            print( $m["message"]);
            echo "</li>";
            }
            echo config("flashmsg.wrapper.suffix");
        } ?>';
    }
}