<?php

namespace App\Domain\Tasks\Gateways;

use App\Models\Tasks;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskGateways
{
    public function index(?int $status, int $page): LengthAwarePaginator
    {
        if ($status) {
            return Tasks::where('completed', $status)->paginate($page);
        }
        return Tasks::paginate($page);
    }
}
