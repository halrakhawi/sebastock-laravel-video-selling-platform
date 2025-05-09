<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                Paginator::useBootstrap();

        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        
         $this->app->bind('path.public', function() {
    return base_path('../public_html');
 });
        
    }
}
