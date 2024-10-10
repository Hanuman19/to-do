<?php

namespace App\Http\Request\Tasks;

use App\Http\Request\Common\AuthorizeTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $title
 * @property string $description
 * @property string $completed_at
 * @property string $completed
 */
class UpdateRequest extends FormRequest
{
    use AuthorizeTrait;
    public function authorize(): bool
    {
        return $this->checkAuth();
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
