<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualitas_Telur extends Model
{
    use HasFactory;
    public $table = "kualitas_telurs";

    protected $fillable = [
        'no_kualitas_tlr',
        'kualitas_telur',
        'berat_kualitas_telur',
        'pembuat',
    ];
}
