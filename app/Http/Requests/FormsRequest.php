<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function attributes()
    {
        return [
            'school_class_id' => "class",
        ];
    }
    public function rules(): array
    {
        return [
            'nis' => 'unique:students|max:10|required',
            'name' => 'max:50|required',
            'gender' => 'required',
            'school_class_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => "Nis wajib diisi",
            'nis.max' => "nis maximal :max digit"
        ];
    }
}
