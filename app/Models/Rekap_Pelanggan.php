<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_Pelanggan extends Model
{
    use HasFactory;
    public $table = "rekap_pelanggans";

    protected $fillable = [
        'no_customer',
        'nama_lengkap',
        'no_kualitas_tlr',
        'harga_lama',
        'jumlah_satuan_pembelian',
        'berat_pembelian',
        'total_harga',
        'no_kontak',
        'alamat_customer',
        'kwitansi',
        'pembuat',
    ];
}
