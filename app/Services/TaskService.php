<?php

namespace App\Services;

use App\DTOs\TaskDTO;
use App\Models\Task;

class TaskService
{
    public function getAllTasks(): array
    {
        $tasks = Task::all();
        $taskDTOs = [];

        foreach ($tasks as $task) {
            $taskDTOs[] = new TaskDTO($task->id, $task->content);
        }

        return $taskDTOs;
    }

    public function createTask(TaskDTO $taskDTO): void
    {
        $task = new Task([
            'content' => $taskDTO->content,
        ]);

        $task->save();
    }

    public function updateTask(int $taskId, TaskDTO $taskDTO): void
    {
        $task = Task::findOrFail($taskId);

        $task->content = $taskDTO->content;
        $task->save();
    }

    public function deleteTask(int $taskId): void
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
    }
}
