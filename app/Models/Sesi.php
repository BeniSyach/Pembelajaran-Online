<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;
    protected $table = 'sesi';

    protected $fillable = [
        'nama_sesi',
        'deskripsi',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }


}
