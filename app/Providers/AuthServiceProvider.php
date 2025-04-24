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
        // Example: \App\Models\Model::class => \App\Policies\ModelPolicy::class,
        // Map your models to policies here if using policies.
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // ✅ Gate for Student Role
        Gate::define('isStudent', function (User $user) {
            return $user->role === 'student';
        });

        // You can define more gates here
        // Gate::define('isAdmin', fn(User $user) => $user->role === 'admin');
        // Gate::define('isTeacher', fn(User $user) => $user->role === 'teacher');
    }
}
