<?php

namespace App\Domain\Tasks\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property string $completed
 */
class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (Auth::user()) {
            return true;
        }
        return false;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'completed' => 'nullable|boolean',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'completed_at.date' => 'completed должен быть буллевым значением',
        ];
    }
}
