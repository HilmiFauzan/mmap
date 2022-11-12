<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi_Telur extends Model
{
    use HasFactory;
    public $table = "produksi_telurs";

    protected $fillable = [
        'no_produksi',
        'ttl_tiap_kdng',
        'ttl_berat_tiap_kdng',
    ];
}
