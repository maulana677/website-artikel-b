<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'gambar',
        'sumber_gambar',
        'judul',
        'deskripsi',
        'nama_penulis',
        'tanggal_posting'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
