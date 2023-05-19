<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\EmployeeDataController;

Route::post('login' , [AuthController::class , 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(["middleware" => "role:manager"], function() {
        //admin apis
        Route::apiResource('employees', EmployeeController::class);
        Route::apiResource('departments', DepartmentController::class);
        Route::apiResource('tasks', TaskController::class);
        Route::post('assign/tasks' , [TaskController::class , 'assignEmployeesToTask'])->name('assign.task');
    });

    Route::group(["middleware" => "role:employee"], function() {
        //employee apis
        Route::get('/get/user/tasks' , [EmployeeDataController::class , 'getUserTasks'])->name('user.task');
        Route::put('/update/user/tasks/{id}' , [EmployeeDataController::class , 'updateUserTasks'])->name('updateUser.task');
    });

    Route::post('logout' , [AuthController::class , 'logout'])->name('logout');
});
