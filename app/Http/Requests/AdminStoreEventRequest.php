<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreEventRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'kategori_wilayah_id' => 'required|exists:kategori_wilayahs,id',
            'kategori_event_id' => 'required|exists:kategori_events,id',
            'status' => 'required|string|in:gratis,berbayar',
            'deskripsi' => 'required|string|min:100',
            'tempat' => 'required|string|max:255',
            'daftar' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Gambar harus diisi.',
            'title.required' => 'Judul harus diisi.',
            'event_date.required' => 'Tanggal acara harus diisi.',
            'kategori_wilayah_id.required' => 'Kategori wilayah harus diisi.',
            'kategori_event_id.required' => 'Kategori event harus diisi.',
            'status.required' => 'Status harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi min 100 karakter.',
            'tempat.required' => 'Tempat harus diisi.',
            'daftar.required' => 'Daftar harus diisi.',
        ];
    }
}
