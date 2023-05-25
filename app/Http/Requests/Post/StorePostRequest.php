<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10248',

        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Kolom image harus di isi',
            'image.image' => 'Kolom image harus berupa image',
            'image.mimes' => 'Image harus berformat jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Image maksimum yaitu 10MB',
        ];
    }
}
