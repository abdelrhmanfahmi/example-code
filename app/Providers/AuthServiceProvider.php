<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Models\Department;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('delete_department', function ($user, $departmentId) {
            $department = Department::where('id' , $departmentId)->whereHas('users')->exists();

            if($department){
                echo 'you cannot delete department has users';
                return false;
            }else{
                return true;
            }
        });

        Gate::define('update_task', function ($user, $taskId) {
            $task = Task::where('id' , $taskId)->whereHas('users' , function($q) use($user){
                $q->where('employee_tasks.user_id' , $user->id);
            })->exists();

            if($task){
                return true;
            }else{
                echo 'cannot update task not assigned to it';
                return false;
            }
        });
    }
}
