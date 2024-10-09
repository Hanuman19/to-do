<?php

namespace App\Domain\Auth\Request;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $user
 * @property string $password
 */
class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user' => 'required|string',
            'password' => 'required|string'
        ];
    }
}
