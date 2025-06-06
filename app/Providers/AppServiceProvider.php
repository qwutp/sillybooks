<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return $user->hasRole('admin');
        });

        Gate::define('manage-users', function (User $user) {
            return $user->hasPermission('manage-users');
        });
        
        Gate::define('manage-books', function (User $user) {
            return $user->hasPermission('manage-books');
        });
        
        Gate::define('manage-authors', function (User $user) {
            return $user->hasPermission('manage-authors');
        });
        
        Gate::define('manage-genres', function (User $user) {
            return $user->hasPermission('manage-genres');
        });
        
        Gate::define('manage-reviews', function (User $user) {
            return $user->hasPermission('manage-reviews');
        });
        
        Gate::define('view-admin-dashboard', function (User $user) {
            return $user->hasPermission('view-admin-dashboard');
        });

        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });
        
        Blade::if('permission', function ($permission) {
            return auth()->check() && auth()->user()->hasPermission($permission);
        });
    }
}
