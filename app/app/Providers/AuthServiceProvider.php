<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        // gates algemeen
        Gate::define('view-dashboard', function (User $user) {
            return $user->role == 'coordinator';
        });

        Gate::define('view-student-tasks', function (User $user) {
            return $user->role == 'mentor';
        });

        // gates studenten
        Gate::define('view-students', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('add-student', function (User $user) {
            return $user->role == 'coordinator';
        });

        // gates companies
        Gate::define('view-companies', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('add-company', function (User $user) {
            return $user->role == 'coordinator';
        });

        Gate::define('add-proposal', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('delete-proposal', function (User $user) {
            return $user->role == 'coordinator';
        });
    }
}
