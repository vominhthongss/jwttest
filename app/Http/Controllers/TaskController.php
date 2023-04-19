<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);

    }
    public function getAllTask()
    {
        $task = Task::getAllTask();
        return response()->json(['tasks' => $task]);
    }

    public function addTask()
    {
        $data = request(['content']);
        $task = new Task();
        $task->name = $data['content'];
        $task->save();
        return response()->json(['info' => 'success']);
    }
}
