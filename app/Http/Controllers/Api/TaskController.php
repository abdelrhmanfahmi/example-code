<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Repositories\EmployeeRepository;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\AssignRequest;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository , private EmployeeRepository $employeeRepository)
    {

    }

    public function searchTasks(Request $request)
    {
        $tasks = $this->taskRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        if($request->name){
            $tasks = $this->taskRepository->get(['name' => $request->name] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        }
        return view('tasks.index' , ['tasks' => $tasks]);
    }

    public function searchMyTasks(Request $request)
    {
        $tasks = $this->taskRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        if($request->name){
            $tasks = $this->taskRepository->get(['name' => $request->name] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        }
        return view('userTasks.index' , ['tasks' => $tasks]);
    }

    public function index() //search on task if search attribute is variable $name
    {
        $tasks = $this->taskRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        return view('tasks.index' , ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 'pending';
        $this->taskRepository->store($data);
        return redirect()->route('tasks.index');
    }

    public function assignTaskView()
    {
        $employees = $this->employeeRepository->get([], false , [] , [] , 15 , 'created_at' , 'asc' , false);
        $tasks = $this->taskRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        return view('tasks.assign_task' , ['employees' => $employees , 'tasks' => $tasks]);
    }

    public function assignEmployeesToTask(AssignRequest $request)
    {
        $data = $request->validated();
        $this->taskRepository->assignUsers($data);
        return redirect()->route('tasks.index');
    }
}
