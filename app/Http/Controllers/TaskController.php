<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function getAllTask()
    {
        $task = Task::getAllTask();
        return response()->json(['tasks' => $task], 200);
    }

    public function addTask()
    {
        $data = request(['content']);
        $task = new Task([
            'content' => $data['content']
        ]);
        $task->save();
        return response()->json(['sucess' => 'item is added!'], 200);
    }

    public function updateTask($id)
    {
        $data = request(['content']);
        $task = Task::find($id);
        $task->updateTask($data['content']);
        return response()->json(['success' => 'item is updated!'], 200);
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->deleteTask();
        return response()->json(['success' => 'item is deleted!'], 200);
    }
}
