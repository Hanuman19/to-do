<?php

namespace App\Http\Request\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Request\Common\AuthorizeTrait;
/**
 * @property string $title
 * @property string $description
 * @property string $completed_at
 */
class CreateRequest extends FormRequest
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
