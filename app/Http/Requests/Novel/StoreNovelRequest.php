<?php

namespace App\Http\Requests\Novel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreNovelRequest extends FormRequest
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
            'novel_category_id' => ['required'],
            'writer' => [
                'required',
                'string',
                'max:255',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => ['nullable'],
            'image' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg',
            ],
            'publish_date' => [
                'nullable',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'novel_category_id.required' => 'The category field is required.',
            'writer.required' => 'The writer field is required.',
            'writer.string' => 'The Writer must be a string.',
            'writer.max' => 'The writer may not be greater than 255 characters.',
            'title.required' => 'The title field is required',
            'title.string' => 'The title Writer must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'image.required' => 'The image field is required',
            'image.image' => 'The :attribute must be an image.',
            'image.mimes' => 'The photo must be a file of type: jpg, png, jpeg.',
        ];
    }
}
