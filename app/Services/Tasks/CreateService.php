<?php

namespace App\Services\Tasks;

use App\Http\Exception\ActionException;
use App\Models\Tasks;
use App\Services\Tasks\DTO\TasksDTO;

class CreateService
{
    public function service(TasksDTO $data): Tasks
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
}
