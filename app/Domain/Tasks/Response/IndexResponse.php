<?php

namespace App\Domain\Tasks\Response;

use App\Http\Response\BaseResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexResponse extends BaseResponse
{
    public LengthAwarePaginator $items;
}
