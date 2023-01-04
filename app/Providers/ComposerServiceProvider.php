<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['*'], 'App\Http\ViewComposer\MenuComposer');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            //
    }
}
