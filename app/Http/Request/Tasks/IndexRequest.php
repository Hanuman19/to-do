<?php

namespace App\Http\Request\Tasks;

use App\Http\Request\Common\AuthorizeTrait;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $completed
 */
class IndexRequest extends FormRequest
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
