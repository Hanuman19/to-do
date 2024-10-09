<?php

use App\Domain\Auth\Response\AuthResponse;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('user', [AuthController::class, 'authenticateToken']);

Route::post('user', function (Request $request) {
    $response = new AuthResponse();

    if (Auth::attempt([
        'name' => $request->user,
        'password' => $request->password,
    ])) {
        $token = $request->user()->createToken($request->user);
        $response->token = $token->plainTextToken;
        $response->success = true;
    } else {
        $response->setMsg('Ошибка авторизации');
    }
    return get_object_vars($response);
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
