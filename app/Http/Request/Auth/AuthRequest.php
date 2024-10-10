<?php

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $user
 * @property string $password
 */
class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'user' => 'required|string',
            'password' => 'required|string'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'user.required' => 'User не передан',
            'password.required' => 'Password не передан',
        ];
    }
}
