<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total_Telur extends Model
{
    use HasFactory;
    public $table = "total_telurs";

    protected $fillable = [
        'total_seluruh_telur',
        'total_berat_seluruh_telur',
        'pembuat',
    ];
}
