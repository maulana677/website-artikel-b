<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreKategoriWilayahRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nama_wilayah' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nama_wilayah.required' => 'Nama wilayah harus diisi.',
            'nama_wilayah.string' => 'Nama wilayah harus berupa teks.',
            'nama_wilayah.max' => 'Nama wilayah tidak boleh lebih dari 255 karakter.',
        ];
    }
}
