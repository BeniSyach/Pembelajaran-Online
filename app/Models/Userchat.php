<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userchat extends Model
{
    public $table = 'userchat';

    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['guru', 'siswa'];

    // Relasi Ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'email', 'email');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'email', 'email');
    }

    public function getRouteKeyName()
    {
        return 'key';
    }
}
