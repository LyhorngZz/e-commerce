<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Category;
use App\Policies\CategoryPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Register policies FIRST
        Gate::policy(Category::class, CategoryPolicy::class);

        // Admin bypass (admin can do everything)
        Gate::before(function (User $user, string $ability) {
            return $user->hasRole('admin') ? true : null;
        });

        // User management
        Gate::define('users.manage', fn (User $user) =>
            $user->hasPermission('users.manage')
        );

        // Product permissions
        Gate::define('products.create', fn (User $user) =>
            $user->hasPermission('products.create')
        );

        Gate::define('products.update', fn (User $user) =>
            $user->hasPermission('products.update')
        );

        Gate::define('products.delete', fn (User $user) =>
            $user->hasPermission('products.delete')
        );

        // Category permissions
        Gate::define('categories.create', fn (User $user) =>
            $user->hasPermission('categories.create')
        );

        Gate::define('categories.update', fn (User $user) =>
            $user->hasPermission('categories.update')
        );

        Gate::define('categories.delete', fn (User $user) =>
            $user->hasPermission('categories.delete')
        );
    }
}
