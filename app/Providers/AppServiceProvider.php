<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }

    public function boot()
    {
        //
    }
}
