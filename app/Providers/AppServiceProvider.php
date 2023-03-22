<?php

namespace App\Providers;

use Laravel\Sanctum\Sanctum;
use App\Models\PersonalAccessToken;
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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Sanctum::authenticateAccessTokensUsing(function($accessToken, $isValid) {
            if(empty($accessToken->last_used_at)) {
                return $isValid;
            }
            else {
                return $isValid || ($accessToken->last_used_at->gt(now()->subMinutes(6)));
            }
        });
    }
}
