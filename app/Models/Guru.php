<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public $table = 'guru';

    use HasFactory;

    protected $guarded = ['id'];
    protected $attributes = [
        'avatar' => 'default.png',
        'role' => 2,
        'is_active' => 0
    ];
    

    // Relasi Ke Gurukelas
    public function gurukelas()
    {
        return $this->hasMany(Gurukelas::class);
    }

    // Relasi Ke Gurumapel
    public function gurumapel()
    {
        return $this->hasMany(Gurumapel::class);
    }

    // Relasi Ke Materi
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    // Relasi Ke Tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    // Relasi Ke Ujian
    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

    // Relasi Ke Chat
    public function userchat()
    {
        return $this->hasMany(Userchat::class, 'email', 'email');
    }
}
