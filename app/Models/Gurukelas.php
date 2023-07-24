<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gurukelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['guru', 'kelas'];

    // Relasi Ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
