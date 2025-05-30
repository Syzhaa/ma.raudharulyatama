<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Logo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        /*
            Make Your Url Force Https 
        */
        // URL::forceScheme('https');
        //

        /*
            Bootstrap Pagination Style
        */
        Paginator::useBootstrap();
        //

        /***
            Blade Directive , example using : @example or @example('expression') 
         */
        Blade::directive('count', function ($expression) {
            return "<?php echo DB::table($expression)->count() ?>";
        });
        //

        // Tambahkan View Composer untuk logo
        View::composer('*', function ($view) {
            $view->with('logo', Logo::first());
        });
    }
}
