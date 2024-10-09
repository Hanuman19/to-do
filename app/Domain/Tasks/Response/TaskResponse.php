<?php

namespace App\Domain\Tasks\Response;

use App\Http\Response\BaseResponse;
use App\Models\Tasks;

class TaskResponse extends BaseResponse
{
    public Tasks $task;
}
