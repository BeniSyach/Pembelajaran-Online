<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesSesi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table ='akses_sesi';
    protected $with = ['sesi', 'kelas'];

    // Relasi Ke Guru
    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }

    // Relasi Ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
