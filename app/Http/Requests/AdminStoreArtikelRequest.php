<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreArtikelRequest extends FormRequest
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sumber_gambar' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:100',
            'nama_penulis' => 'required|string|max:255',
            'tanggal_posting' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'gambar.required' => 'Gambar harus diisi max 2 Mb',
            'sumber_gambar.required' => 'Sumber gambar harus diisi',
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi min 100 karakter',
            'nama_penulis.required' => 'Penulis harus diisi',
            'tanggal_posting.required' => 'Tanggal harus diisi',
        ];
    }
}
