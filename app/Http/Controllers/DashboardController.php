<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;
use App\Models\Kandang;
use App\Models\Produksi_Telur;
use App\Models\Total_Telur;

class DashboardController extends Controller
{
    public function menu_utama()
    {
        $feedback = DB::table('feedbacks')
            // ->join('feedbacks', 'image.email', '=', 'feedbacks.email')
            ->join('users', 'users.email', '=', 'feedbacks.email')
            ->select('feedbacks.*', 'users.file')
            ->where('rating', '>=', 4)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        // $feedback = DB::table('feedbacks')->get();
        //dd($feedback);
        return view('main', ['feedbacks' => $feedback]);
    }

    public function produksi_telur()
    {
            $date = date('Y-m-d');
            $select = DB::table('produksi_telurs')->count();
            if (empty($select)) {
                $total_telur = 0;
            }
            else{
                $total_telur = DB::table('produksi_telurs')->whereDate('created_at', $date)->sum('ttl_tiap_kdng');
            }
        return $total_telur;
    }

    public function kandang()
    {
        $kandangs = DB::table('kandangs')->select('banyak_kandang')->first();
        if (!empty($kandangs)) {
            $kandang = $kandangs->banyak_kandang;
        }
        else{
            $kandang = 0;
        }
        return $kandang;
    }

    public function harga_telur()
    {
        $harga_telur = DB::table('harga_telurs')->count();
        if (empty($harga_telur)) {
            $harga_telur = "Harga Belum Diisi";
        }
        else{
            $harga_telur = DB::table('harga_telurs')->get();
        }
        
        return $harga_telur;
    }

    public function total_telur()
    {
        $total_telur = DB::table('kualitas_telurs')->sum('kualitas_telur');
        return $total_telur;
    }

    public function user()
    {
        $user = DB::table('users')->where('hak_akses', '=', 'member')->count();
        return $user;
    }

    public function indexAdmin()
    {
        if(Auth::user()->hak_akses != "member"){
            $telurs = $this->produksi_telur();
            $kandang = $this->kandang();
            $total_telur = $this->total_telur();
            $user = $this->user();
            return view('dashboard/dashboard_content/main-dash', ['telurs'=>$telurs, 'kandang' => $kandang, 'total_telur' => $total_telur, 'user' => $user]);
        }
        // return view('dashboard/dashboard_content/update_partials/update-account-content');
    }

    public function indexCustomer()
    {
        if(Auth::user()->hak_akses == "member"){
            // return view('dashboard/dashboard_content/customer_partials/update_account_customer');
            $telurs = $this->produksi_telur();
            $kandang = $this->kandang();
            $total_telur = $this->total_telur();
            $harga_telur = $this->harga_telur();
            // dd($harga_telur);
            return view('dashboard/dashboard_content/main-dash-customer', ['telurs'=>$telurs, 'kandang' => $kandang, 'total_telur' => $total_telur, 'harga_telur' => $harga_telur]);
        }
    }

    public function view_total_berat_telur()
    {   
        $date = date('Y-m-d');
        $select = DB::table('produksi_telurs')->count();
        if (empty($select)) {
            $total_telur = 0;
            $total_berat_telur = 0;
        }
        else{
            $total_telur = DB::table('produksi_telurs')->whereDate('created_at', $date)->sum('ttl_tiap_kdng');
            $total_berat_telur = DB::table('produksi_telurs')->whereDate('created_at', $date)->sum('ttl_berat_tiap_kdng');
        }

        // $kandangs = DB::table('kandangs')->select('banyak_kandang')->first();
        // if (!empty($kandangs)) {
        //     $kandang = $kandangs->banyak_kandang;
        // }
        // else{
        //     $kandang = is_integer(0);
        // }
        
        $produksi_telur = DB::table('produksi_telurs')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'produksi');
        
        $kualitas_telur = DB::table('kualitas_telurs')->orderBy('created_at', 'asc')->paginate(3, ['*'], 'kualitas');
        $harga_telur = DB::table('harga_telurs')->get();

        return view('dashboard/dashboard_content/view_data/view_total_berat_telur', [
            'produksis' => $produksi_telur,
            'total_telur' => $total_telur,
            'total_berat_telur' => $total_berat_telur, 
            'kualitas_telur' => $kualitas_telur, 
            'harga_telur' => $harga_telur
        ]);
    }

}
