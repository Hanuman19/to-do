<?php

namespace App\Http\Response\Tasks;

use App\Http\Response\BaseResponse;
use App\Models\Tasks;

class TaskResponse extends BaseResponse
{
    public Tasks $task;
}
