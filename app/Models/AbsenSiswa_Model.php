<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSiswa_Model extends Model
{
    use HasFactory;

    public $table = 'absen_siswa';

    protected $guarded = ['idAbsen'];

    protected $fillable = [
        'siswa_id',
        'status',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
