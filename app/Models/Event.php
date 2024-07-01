<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'event_date',
        'kategori_wilayah_id',
        'status',
        'deskripsi',
        'tempat',
        'daftar'
    ];

    public function kategoriWilayah()
    {
        return $this->belongsTo(KategoriWilayah::class);
    }
}
