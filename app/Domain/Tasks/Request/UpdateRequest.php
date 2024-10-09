<?php

namespace App\Domain\Tasks\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property string $title
 * @property string $description
 * @property string $completed_at
 * @property string $completed
 */
class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'completed_at' => 'nullable|date',
            'completed' => 'nullable|boolean',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title обязательный параметр',
            'completed_at.date' => 'completed_at должен быть датой',
        ];
    }
}
