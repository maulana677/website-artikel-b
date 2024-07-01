<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWilayah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_wilayah'];

    public function events()
    {
        return $this->hasMany(Event::class, 'kategori_wilayah_id');
    }
}
