<?php

namespace App\Http\Controllers;

use App\DTOs\TaskDTO;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->middleware('auth:api');
        $this->taskService = $taskService;
    }

    public function index(): JsonResponse
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json(['tasks' => $tasks], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $taskDTO = new TaskDTO(null, $request->input('content'));
        $this->taskService->createTask($taskDTO);
        return response()->json(['success' => 'item is added!'], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $taskDTO = new TaskDTO(null, $request->input('content'));
        $this->taskService->updateTask($id, $taskDTO);
        return response()->json(['success' => 'item is updated!'], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->taskService->deleteTask($id);
        return response()->json(['success' => 'item is deleted!'], 200);
    }
}
