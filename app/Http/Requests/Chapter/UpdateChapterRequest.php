<?php

namespace App\Http\Requests\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChapterRequest extends FormRequest
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
            'novel_id' => [
                'nullable',
            ],
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],
            'pdf' => [
                'nullable',
                'mimes:pdf',
                'max:10248',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'The title Writer must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'pdf.mimes' => 'The photo must be a file of type: pdf.',
        ];
    }
}
