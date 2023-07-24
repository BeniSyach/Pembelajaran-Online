<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssaySiswa extends Model
{
    public $table = 'essay_siswa';
    // Disable the model timestamps
    public $timestamps = false;
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['detailessay'];

    // Relasi ke Detail Ujian
    public function detailessay()
    {
        return $this->belongsTo(DetailEssay::class, 'detail_ujian_id');
    }

    // Relasi ke WaktuUjian
    public function waktuujian()
    {
        $this->belongsTo(WaktuUjian::class, 'siswa_id', 'siswa_id');
    }
}
