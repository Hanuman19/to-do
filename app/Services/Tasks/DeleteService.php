<?php

namespace App\Services\Tasks;

use App\Http\Exception\ActionException;
use App\Models\Tasks;

class DeleteService
{
    public function service(int $id): bool
    {
        $tasks = Tasks::find($id);
        if ($tasks) {
            return true;
        } else {
            throw new ActionException('Задача не найдена');
        }
    }
}
