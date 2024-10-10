<?php

namespace App\Http\Response\Tasks;

use App\Http\Response\BaseResponse;

class IndexResponse extends BaseResponse
{
    public array $data = [];
    public int $current_page = 0;
    public int $total = 0;
}
