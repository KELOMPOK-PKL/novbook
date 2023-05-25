<?php

namespace App\Http\Requests\Novel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNovelRequest extends FormRequest
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
            'novel_category_id' => ['nullable'],
            'writer' => [
                'nullable',
                'string',
                'max:255',
            ],
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],
            'description' => ['nullable'],
            'image' => [
                'nullable',
                'image',
                'mimes:png,jpg,gif,jpeg',
            ],
            'publish_date' => [
                'nullable',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'writer.string' => 'The Writer must be a string.',
            'writer.max' => 'The writer may not be greater than 255 characters.',
            'title.string' => 'The title Writer must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image.image' => 'The :attribute must be an image.',
            'image.mimes' => 'The photo must be a file of type: jpg, png, jpeg.',
        ];
    }
}
