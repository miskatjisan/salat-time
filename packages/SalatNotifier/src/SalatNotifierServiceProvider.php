<?php

namespace SalatNotifier;

use Illuminate\Support\ServiceProvider;

class SalatNotifierServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register()
    {
        
    }
}
