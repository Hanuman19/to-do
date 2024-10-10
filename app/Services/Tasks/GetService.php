<?php

namespace App\Services\Tasks;

use App\Http\Response\Tasks\IndexResponse;
use App\Models\Tasks;

class GetService
{
    public function service(?int $status, int $page): array
    {
        $response = new IndexResponse();

        if ($status) {
            $paginate = Tasks::where('completed', $status)->paginate($page);
        } else {
            $paginate = Tasks::paginate($page);
        }

        $response->success = true;
        $response->data = $paginate->items();
        $response->total = $paginate->total();
        $response->current_page = $paginate->currentPage();
        return $response->toArray();
    }
}
