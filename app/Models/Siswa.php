<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $table = 'siswa';
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['kelas'];

    protected $attributes = [
        'avatar' => 'default.png',
        'role' => 3,
        'is_active' => 0
    ];

    // Relasi Ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi Ke Chat
    public function userchat()
    {
        return $this->hasMany(Userchat::class, 'email', 'email');
    }


    // Relasi Ke Tugas Siswa
    public function tugassiswa()
    {
        return $this->hasMany(TugasSiswa::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function kelompokbelajarsiswa()
    {
        return $this->hasMany(KelompokBelajarSiswa::class);
    }

    // relasi Ke WaktuUjian
    public function waktuujian()
    {
        return $this->hasMany(WaktuUjian::class);
    }

    
    public function getRouteKeyName()
    {
        return 'nis';
    }
}
