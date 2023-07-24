<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgSiswa extends Model
{
    public $table = 'pg_siswa';
    // Disable the model timestamps
    public $timestamps = false;
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['detailujian'];

    // Relasi ke Detail Ujian
    public function detailujian()
    {
        return $this->belongsTo(DetailUjian::class, 'detail_ujian_id');
    }

    // Relasi ke WaktuUjian
    public function waktuujian()
    {
        $this->belongsTo(WaktuUjian::class, 'siswa_id', 'siswa_id');
    }
}
