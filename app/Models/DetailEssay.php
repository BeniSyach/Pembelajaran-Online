<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailEssay extends Model
{
    public $table = 'detail_essay';
    // Disable the model timestamps
    public $timestamps = false;
    use HasFactory;
    protected $guarded = ['id'];

    // Relasi Ke Ujian
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
