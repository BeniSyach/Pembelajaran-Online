<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KmTugas extends Model
{
    public $table = 'km_tugas';
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['guru', 'sesi', 'kelas','mapel'];

    // Relasi Ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    // Relasi Ke sesi
    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }
    // relasi Ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    // relasi Ke mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    

    // DEFAULT KEY DI UBAH JADI KODE BUKAN ID LAGI
    public function getRouteKeyName()
    {
        return 'kode';
    }
}

