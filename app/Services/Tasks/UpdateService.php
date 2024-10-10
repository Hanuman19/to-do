<?php

namespace App\Services\Tasks;

use App\Models\Tasks;
use App\Services\Tasks\DTO\TasksDTO;

class UpdateService
{
    public function service(TasksDTO $data): Tasks
    {
        $task = Tasks::find($data->id);
        $task->fill($data->toArray());
        $task->save();
        return $task;
    }
}
