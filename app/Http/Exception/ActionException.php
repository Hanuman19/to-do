<?php

namespace App\Http\Exception;


use Symfony\Component\HttpKernel\Exception\HttpException;

class ActionException extends HttpException
{
    public function __construct(string $message, int $code = 500)
    {
        parent::__construct($code, $message);
    }
}
