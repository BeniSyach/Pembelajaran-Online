<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gurumapel extends Model
{
    public $table = 'gurumapel';
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['guru', 'mapel'];

    // Relasi Ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
