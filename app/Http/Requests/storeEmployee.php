<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmployee extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:20|min:5',
            'position' => 'required|string|max:20|min:2'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama depan tidak boleh kosong',
            'name.string' => 'Nama harus merupakan kalimat',
            'name.max' => 'Nama depan maksimal 20 karakter',
            'name.min' => 'Nama depan minimal 5 karakter',
            'position.required' => 'Position tidak boleh kosong',
            'position.string' => 'Position harus merupakan kalimat',
            'position.max' => 'Position maksimal 20 karakter',
            'position.min' => 'Position maksimal 5 karakter'
        ];
    }
}
