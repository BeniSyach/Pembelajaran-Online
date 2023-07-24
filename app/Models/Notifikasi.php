<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    public $table = 'notifications';
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['materi'];

    // Relasi ke materi
    public function materi()
    {
        return $this->belongsTo(Materi::class, 'kode', 'kode');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'kode', 'kode');
    }
}
