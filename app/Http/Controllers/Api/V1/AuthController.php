<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Auth\Request\AuthRequest;
use App\Domain\Auth\Response\AuthResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticateToken(AuthRequest $request)
    {
        dd(1);
        return 123;
        $response = new AuthResponse();
        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password,
        ])) {
            $token = $request->user()->createToken($request->name);
            $response->token = $token->plainTextToken;
            $response->success = true;
        } else {
            $response->setMsg('Ошибка авторизации');
        }
        return $response;
    }
}
