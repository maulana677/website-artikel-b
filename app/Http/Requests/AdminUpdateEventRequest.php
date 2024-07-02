<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateEventRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_date' => 'sometimes|required|date',
            'kategori_wilayah_id' => 'sometimes|required|exists:kategori_wilayahs,id',
            'status' => 'sometimes|required|string|in:gratis,berbayar',
            'deskripsi' => 'required|string|min:100',
            'tempat' => 'sometimes|required|string|max:255',
            'daftar' => 'sometimes|required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi.',
            'image.required' => 'Gambar harus diisi.',
            'event_date.required' => 'Tanggal acara harus diisi.',
            'kategori_wilayah_id.required' => 'Kategori wilayah harus diisi.',
            'status.required' => 'Status harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'tempat.required' => 'Tempat harus diisi.',
            'daftar.required' => 'Daftar harus diisi.',
        ];
    }
}
