<?php
namespace Webimpacto\LaravelApp4Less\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Webimpacto\LaravelApp4Less\Models\App4Less;

class App4LessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations/');

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}