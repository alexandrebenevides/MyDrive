<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Repositories\Contracts\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Services\Contracts\UserServiceInterface::class, \App\Services\UserService::class);
        $this->app->bind(\App\Services\Contracts\AuthServiceInterface::class, \App\Services\AuthService::class);
        $this->app->bind(\App\Services\Contracts\MyFilesServiceInterface::class, \App\Services\MyFilesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
