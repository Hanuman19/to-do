<?php

namespace App\Domain\Auth\Response;

use App\Http\Response\BaseResponse;

class AuthResponse extends BaseResponse
{
    public string $token;
}
