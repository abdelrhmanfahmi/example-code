<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;
use App\Repositories\TaskRepository;
use App\Http\Resources\EmployeeDataResource;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\EmployeeTask;

class EmployeeDataController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository , private TaskRepository $taskRepository)
    {

    }
    public function getUserTasks()
    {
        $data = $this->employeeRepository->get([], false , ['department' , 'tasks'] , false , 15 , 'created_at' , 'asc' , false);
        return EmployeeDataResource::collection($data);
    }

    public function updateUserTasks(UpdateTaskRequest $request , $task)
    {
        $this->authorize('update_task' , $task);
        $data = $request->validated();
        $this->taskRepository->update($data , $task);
        return response()->json(['message' => 'Task Updated Successfully']);
    }
}
