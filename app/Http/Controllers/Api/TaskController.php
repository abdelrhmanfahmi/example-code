<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\AssignRequest;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository)
    {

    }

    public function index(Request $request) //search on task if search attribute is variable $name
    {
        $name = $request->name;
        $tasks = $this->taskRepository->get([] , false , ['users'] , false , 15 , 'created_at' , 'asc' , false);
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $this->taskRepository->store($data);
        return response()->json(['message' => 'Task Created Successfully']);
    }

    public function assignEmployeesToTask(AssignRequest $request)
    {
        $data = $request->validated();
        $this->taskRepository->assignUsers($data);
        return response()->json(['message' => 'Task Assigned Successfully']);
    }
}
