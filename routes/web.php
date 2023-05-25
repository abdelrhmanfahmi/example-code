<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\EmployeeDataController;

Route::get('login' , [AuthController::class , 'showLoginPage'])->name('show.login');
Route::post('login' , [AuthController::class , 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/home' , [HomeController::class , 'home'])->name('home');

    Route::group(["middleware" => "role:manager"], function() {
        //admin apis
        Route::resource('employees', EmployeeController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('tasks', TaskController::class);
        Route::get('assign/tasks' , [TaskController::class , 'assignTaskView'])->name('assign.taskView');
        Route::post('assign/tasks' , [TaskController::class , 'assignEmployeesToTask'])->name('assign.task');
        Route::post('/search/employee' , [EmployeeController::class , 'searchEmployee'])->name('search.employee');
        Route::post('/search/department' , [DepartmentController::class , 'searchDepartments'])->name('search.departments');
        Route::post('/search/tasks' , [TaskController::class , 'searchTasks'])->name('search.tasks');
    });

    Route::group(["middleware" => "role:employee"], function() {
        //employee apis
        Route::get('/get/user/tasks' , [EmployeeDataController::class , 'getUserTasks'])->name('user.task');
        Route::get('/update/status/tasks/{id}' , [EmployeeDataController::class , 'showUpdateTaskView'])->name('updateTask.view');
        Route::put('/update/user/tasks/{id}' , [EmployeeDataController::class , 'updateUserTasks'])->name('updateUser.task');
        Route::post('/search/myTasks' , [TaskController::class , 'searchMyTasks'])->name('search.myTasks');
    });

    Route::get('logout' , [AuthController::class , 'logout'])->name('logout');
});
