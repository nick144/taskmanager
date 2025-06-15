<?php

namespace App\Services;

use App\Interfaces\TaskServiceInterface;
use App\Models\Task;


class TaskService implements TaskServiceInterface
{
    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update(int $id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete(int $id)
    {
        return Task::destroy($id);
    }

    public function getAll()
    {
        return Task::all();
    }
}