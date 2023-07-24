<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSettings extends Model
{
    // use HasFactory;

    public $table = 'email_settings';
    use HasFactory;
    protected $guarded = ['id'];
}
