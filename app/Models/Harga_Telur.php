<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga_Telur extends Model
{
    use HasFactory;
    public $table = "harga_telurs";

    protected $fillable = [
        'no_kualitas_tlr',
        'jenis_kualitas_telur',
        'harga_telur',
    ];
}
