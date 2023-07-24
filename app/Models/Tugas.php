<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    public $table = 'km_tugas';

    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['guru', 'mapel', 'kelas'];

    // Relasi Ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    // Relasi Ke Sesi
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    // relasi Ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // DEFAULT KEY DI UBAH JADI KODE BUKAN ID LAGI
    public function getRouteKeyName()
    {
        return 'kode';
    }
}
