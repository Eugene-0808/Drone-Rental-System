<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin-access', fn(User $user) => $user->role === 'admin');

        Gate::define('view-profile', function (User $user, User $profileUser) {
            return $user->id === $profileUser->id || $user->role === 'admin';
        });

        Gate::define('update-profile', function (User $user, User $profileUser) {
            return $user->id === $profileUser->id;
        });

        Gate::define('view-all-orders', fn(User $user) => $user->role === 'admin');
    }

}
