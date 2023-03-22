<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\Exceptions\CustomExceptionHandler;
use App\Repositories\EloquentAuthRepository;
use Illuminate\Contracts\Debug\ExceptionHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthRepository::class, EloquentAuthRepository::class);
        $this->app->bind(ExceptionHandler::class, CustomExceptionHandler::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
