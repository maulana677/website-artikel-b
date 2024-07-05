<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateKategoriEventRequest extends FormRequest
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
            'nama_event' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nama_event.required' => 'Nama event harus diisi.',
            'nama_event.string' => 'Nama event harus berupa teks.',
            'nama_event.max' => 'Nama event tidak boleh lebih dari 255 karakter.',
        ];
    }
}
