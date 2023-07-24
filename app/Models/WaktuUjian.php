<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuUjian extends Model
{
    public $table = 'waktu_ujian';
    // Disable the model timestamps
    public $timestamps = false;
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['siswa', 'ujian', 'pgsiswa'];

    // Relasi Ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    // Relasi ke Ujian
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'kode', 'kode');
    }

    // Relasi ke ph siswa 
    public function pgsiswa()
    {
        return $this->hasMany(PgSiswa::class, 'siswa_id', 'siswa_id');
    }

    // Relasi ke essay siswa 
    public function essaysiswa()
    {
        return $this->hasMany(EssaySiswa::class, 'siswa_id', 'siswa_id');
    }
}
