<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriEvent extends Model
{
    use HasFactory;

    protected $fillable = ['nama_event'];

    public function events()
    {
        return $this->hasMany(Event::class, 'kategori_event_id');
    }
}
