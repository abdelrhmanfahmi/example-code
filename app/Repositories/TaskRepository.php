<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\EmployeeTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class TaskRepository extends BaseRepository
{
    protected $dataSearch = [];
    private $task = null;

    public function __construct(Task $task)
    {
        $this->task = $task;
        $this->dataSearch = ['name'];
        parent::__construct($task , $this->dataSearch);
    }

    public function assignUsers($data)
    {
        EmployeeTask::create([
            'user_id' => $data['user_id'],
            'task_id' => $data['task_id']
        ]);
    }

    public function getMyTasks()
    {
        return Auth::user()->tasks()->get();
    }

}
