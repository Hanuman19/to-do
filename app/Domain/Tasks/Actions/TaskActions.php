<?php

namespace App\Domain\Tasks\Actions;


use App\Domain\Tasks\DTO\TasksDTO;
use App\Http\Exception\ActionException;
use App\Models\Tasks;

class TaskActions
{
    public function create(TasksDTO $data): Tasks
    {
        try {
            $task = new Tasks();
            $task->fill($data->toArray());
            $task->save();
        } catch (\Exception $exception) {
            throw new ActionException($exception->getMessage());
        }

        return $task;
    }

    public function update(TasksDTO $data): Tasks
    {
        $task = Tasks::find($data->id);
        $task->fill($data->toArray());
        $task->save();
        return $task;
    }

    public function delete(int $id): bool
    {
        $tasks = Tasks::find($id);
        if ($tasks) {
            return true;
        } else {
            throw new ActionException('Задача не найдена');
        }
    }
}
