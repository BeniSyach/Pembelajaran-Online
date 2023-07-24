<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    public $table = 'tugas_siswa';
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['siswa', 'tugas'];

    // Relasi Ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'kode', 'kode');
    }

}
