<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftarans,email',
            'no_telp' => 'required|string|max:20',
            'domisili' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'status_pekerjaan' => 'required|string|max:255',
            'minat_divisi' => 'required|string|in:People Development,Talent Acquisition,Internal Finance dan Eksternal Finance,Community Development,Ambassador Development,Eksternal Relation,Community Partner,Social Media Strategist,Graphic Design,Content Creator,Web Developer,Brand Ambassador,Secretary',
            'upload_cv' => 'required|file|max:2048',
            'social_media' => 'required|string|max:255',
            'portofolio' => 'required|string',
            'username' => 'required|string|unique:pendaftarans,username',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama maksimal :max karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_telp.required' => 'No. Telepon harus diisi.',
            'no_telp.string' => 'No. Telepon harus berupa teks.',
            'no_telp.max' => 'No. Telepon maksimal :max karakter.',
            'domisili.required' => 'Domisili harus diisi.',
            'domisili.string' => 'Domisili harus berupa teks.',
            'domisili.max' => 'Domisili maksimal :max karakter.',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi.',
            'tempat_lahir.string' => 'Tempat Lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat Lahir maksimal :max karakter.',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi.',
            'tanggal_lahir.date' => 'Format Tanggal Lahir tidak valid.',
            'status_pekerjaan.required' => 'Status Pekerjaan harus diisi.',
            'status_pekerjaan.string' => 'Status Pekerjaan harus berupa teks.',
            'status_pekerjaan.max' => 'Status Pekerjaan maksimal :max karakter.',
            'minat_divisi.required' => 'Minat Divisi harus dipilih.',
            'minat_divisi.string' => 'Minat Divisi harus berupa teks.',
            'minat_divisi.in' => 'Minat Divisi yang dipilih tidak valid.',
            'upload_cv.required' => 'CV harus diunggah.',
            'upload_cv.file' => 'CV harus berupa file.',
            'upload_cv.max' => 'CV maksimal :max kilobita.',
            'social_media.required' => 'Akun Media Sosial harus diisi.',
            'social_media.string' => 'Akun Media Sosial harus berupa teks.',
            'social_media.max' => 'Akun Media Sosial maksimal :max karakter.',
            'portofolio.required' => 'Portofolio harus diisi.',
            'portofolio.string' => 'Portofolio harus berupa teks.',
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.unique' => 'Username sudah digunakan.',
        ];
    }
}
