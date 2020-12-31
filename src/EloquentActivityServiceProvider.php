<?php

namespace Satya\EloquentActivity;

use \Illuminate\Support\ServiceProvider;

class EloquentActivityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {

    }
}
