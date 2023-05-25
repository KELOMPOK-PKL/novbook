<?php

namespace App\Http\Requests\NovelCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNovelCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'The title Writer must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
        ];
    }
}
