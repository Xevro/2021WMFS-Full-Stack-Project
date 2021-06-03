<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

        // gates dashboard
        Gate::define('view-dashboard', function (User $user) {
            return $user->role == 'coordinator';
        });

        Gate::define('view-dashboard-page', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });

        // gates studenten
        Gate::define('view-students', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('view-students-page', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });
        Gate::define('view-student-tasks', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });
        Gate::define('view-student-tasks-dashboard', function (User $user) {
            return $user->role == 'mentor';
        });
        Gate::define('add-student', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('view-student-details', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });

        // gates companies
        Gate::define('view-companies', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('add-company', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('view-company-details', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });
        Gate::define('view-companies-page', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });

        Gate::define('add-proposal', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('delete-proposal', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('evaluate-proposal', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('view-proposal-details', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });
        Gate::define('view-assign-to-proposal', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });
        Gate::define('view-assign-mentor-to-student', function (User $user) {
            return $user->role == 'coordinator';
        });
        Gate::define('view-proposals-page', function (User $user) {
            return $user->role == 'mentor' || $user->role == 'coordinator';
        });

        // API gates
        Gate::define('api-add-proposal', function (User $user) {
            return $user->role == 'company';
        });
        Gate::define('api-view-companies', function (User $user) {
            return $user->role == 'student';
        });
        Gate::define('api-view-companies-details', function (User $user, $id) {
            return ($user->role == 'student' || $user->role == 'company') && (Auth::user()->company->id == $id || Auth::user()->student->id == $id);
        });
        Gate::define('api-update-company', function (User $user, $id) {
            return $user->role == 'company' && Auth::user()->company->id == $id;
        });
        Gate::define('api-view-proposals', function (User $user, $id) {
            return $user->role == 'student' || $user->role == 'company' && Auth::user()->company->id == $id;
        });
        Gate::define('api-view-proposals-all', function (User $user) {
            return $user->role == 'student' || $user->role == 'company';
        });
        Gate::define('api-view-proposal', function (User $user) {
            return $user->role == 'student' || $user->role == 'company';
        });
        Gate::define('api-update-proposal', function (User $user, $id) {
            return $user->role == 'company' && Auth::user()->company->id == $id;
        });
        Gate::define('api-view-tasks', function (User $user, $studentId) {
            return ($user->role == 'student' || $user->role == 'company') && Auth::user()->student->id == $studentId;
        });
        Gate::define('api-add-task', function (User $user, $id) {
            return $user->role == 'student' && Auth::user()->student->id == $id;
        });
        Gate::define('api-update-task', function (User $user, $taskId) {
            return $user->role == 'student' && Auth::user()->student->id == Task::findOrFail($taskId)->student_id;
        });
        Gate::define('api-delete-proposal', function (User $user, $id) {
            return $user->role == 'company' && Auth::user()->company->id == $id;
        });
        Gate::define('api-view-student', function (User $user) {
            return $user->role == 'student' || $user->role == 'company';
        });
        Gate::define('api-update-student', function (User $user, $id) {
            return $user->role == 'student' && Auth::user()->student->id == $id;
        });

        Gate::define('api-view-student-likes', function (User $user, $id) {
            return $user->role == 'student' && Auth::user()->student->id == $id;
        });
        Gate::define('api-view-student-like', function (User $user, $id) {
            return $user->role == 'student' && Auth::user()->student->id == $id;
        });
        Gate::define('api-add-student-like', function (User $user, $id) {
            return $user->role == 'student' && Auth::user()->student->id == $id;
        });
        Gate::define('api-delete-like', function (User $user, $id) {
            return $user->role == 'student' && Auth::user()->student->id == $id;
        });
    }
}
