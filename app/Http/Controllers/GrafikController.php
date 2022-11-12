<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kandang;
use App\Models\Produksi_Telur;
use App\Models\Total_Telur;
use DB;
use Carbon\Carbon;
// Carbon::setWeekStartsAt(Carbon::SUNDAY);
// Carbon::setWeekEndsAt(Carbon::SATURDAY);

class GrafikController extends Controller
{
    public function grafikProduksi()
    {
        if (Auth::user()->hak_akses != "member") {
            $data = "dashboard/master";
        }
        else{
            $data = "dashboard/master_customer";
        }
        return $data;
    }

    public function viewGrafikProduksi()
    {
        $data = $this->grafikProduksi();
        //dump($data);
        // $query = DB::table('produksi_telurs')->selectRaw('MAX(LEFT(no_produksi,4)) as kd_max')->first();
        $perbandingan_sebelum = DB::table('total_telurs')
            ->select('total_seluruh_telur')
            ->get();
        $perbandingan_sesudah = DB::table('kualitas_telurs')
            ->sum('kualitas_telur');
        //dd($perbandingan_sesudah);

        return view('dashboard/dashboard_content/grafik/grafik_produksi_telur', [
            'data' => $data,
            'sebelum' => $perbandingan_sebelum,
            'sesudah' => $perbandingan_sesudah
        ]);
    }

    // public function checkGrafikProduksi(Request $request)
    // {
        
    // }

    public function viewGrafikHarga()
    {
        $data = $this->grafikProduksi();
        //dump($data);
        $query = DB::table('kualitas_telurs');
        $donut_kualitas_telurs = $query->get();
            // ->whereMonth('created_at', date('m'))
        $bar_kualitas_telurs = $query
            ->get();
        //dd($bar_kualitas_telurs);
        return view('dashboard/dashboard_content/grafik/grafik_harga_telur', ['data' => $data, 'donut_kualitas_telurs' => $donut_kualitas_telurs, 'bar_kualitas_telurs' => $bar_kualitas_telurs]);
    }

    public function viewPelanggan()
    {
        // $pembelian_pelanggan = DB::table('rekap_pelanggans')
        //     ->selectRaw('COUNT(LEFT(created_at, 10)) as data')
        //     // ->groupBy('created_at')
        //     ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()
        //         ->endOfMonth()])
        //     ->get();
        $pembelian_pelanggan = DB::table('rekap_pelanggans')
              ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as data'))
              ->groupBy('date')
              ->get();
            
        $pendapatan = DB::table('rekap_pelanggans')
              ->select(DB::raw('DATE(created_at) as date_pendapatan'), DB::raw('SUM(harga_lama) as harga'))
              ->groupBy('date_pendapatan')
              ->get();

        // dd($pendapatan);
            // ->whereMonth('created_at', date('m'))
        
        return view('dashboard/dashboard_content/grafik/grafik_pelanggan', ['pembelian_pelanggan' => $pembelian_pelanggan, 'pendapatan' => $pendapatan]);
    }
}
