<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'domisili',
        'tempat_lahir',
        'tanggal_lahir',
        'status_pekerjaan',
        'minat_divisi',
        'upload_cv',
        'social_media',
        'portofolio',
        'username',
    ];
}
