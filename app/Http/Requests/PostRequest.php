<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'pdf'=> 'required|mimes:pdf|max:10048',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Kolom name harus di isi',
            'title.required' => 'Kolom title harus di isi',
            'image.required' => 'Kolom image harus di isi',
            'image.image' => 'Kolom image harus berupa image',
            'image.mimes' => 'Image harus berformat jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Image maksimum yaitu 10MB',
            'pdf.required' => 'kolom pdf harus di isi',
            'pdf.mimes' => 'Pdf harus berformat pdf',
            'pdf.max' => 'Pdf maksimum yaitu 10MB',
        ];
    }


}
