<?php

namespace App\Providers;

use App\Enums\UserRole;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


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
        Gate::define('user_manage', fn (User $user) => $user->role === UserRole::Admin);
        Gate::define('test_manage', fn (User $user) => ($user->role === UserRole::Admin || $user->role === UserRole::Doctor));
        Gate::define('radiograph_manage', fn (User $user) => ($user->role === UserRole::Admin || $user->role === UserRole::Doctor));
    }
}
