<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    use HasFactory;
    protected $table = 'resto';
    protected $fillable = [
        'nama_resto','nama_pemilik','alamat','no_hp'
    ];
}
