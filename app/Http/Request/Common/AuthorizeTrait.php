<?php

namespace App\Http\Request\Common;

use Illuminate\Support\Facades\Auth;

trait AuthorizeTrait
{
    public function checkAuth(): bool
    {
        if (Auth::user()) {
            return true;
        }
        return false;
    }
}
