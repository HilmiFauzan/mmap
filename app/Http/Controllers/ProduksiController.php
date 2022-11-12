<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;
use App\Models\Produksi_Telur;
use App\Models\Total_Telur;

class ProduksiController extends Controller
{

    public function produksi_telur()
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

        $kandangs = DB::table('kandangs')->select('banyak_kandang')->get();
        
        return view('dashboard/dashboard_content/form_partials/form-produksi-telur', ['kandangs' => $kandangs, 'total_telur' => $total_telur, 'total_berat_telur' => $total_berat_telur]);
    }

    public function insert_produksi_telur(Request $request)
    {
        // dump($request);
        $jumlahkandang = $request->totaltelur;
        $jumlah_telur = 0;
        $jumlah_berat_telur = 0;

        for ($insert=1; $insert <= $jumlahkandang ; $insert++) {
            $validateData = $request->validate([
                        'telur'.$insert => 'required',
                        'berat'.$insert => 'required'
            ]);
        }

        $date = date('Y-m-d');
        $cek_tanggal = DB::table('produksi_telurs')->whereDate('created_at', $date)->count();
        // dump($cek_tanggal);
        if ($cek_tanggal == 0) {
            for ($insert=1; $insert <= $jumlahkandang ; $insert++) {

                $hasil_telur = $request->input('telur'.$insert);
                $jumlah_telur += $hasil_telur;
                // dump($hasil_telur);
                $hasil_berat_telur = $request->input('berat'.$insert);
                $jumlah_berat_telur += $hasil_berat_telur;
                // dump($hasil_berat_telur);

                $prx="TLR";
                $query = DB::table('produksi_telurs')
                    ->selectRaw('MAX(RIGHT(no_produksi,5)) as kd_max')
                    ->where('no_produksi','LIKE','TLR'.$insert.'%');
                // dd($query->get());
                if($query->count()>0)
                {
                    foreach($query->get() as $k)
                    {
                        $tmp = ((int)$k->kd_max)+1;
                        $kd = $prx.$insert.sprintf("%06s", $tmp);
                    }
                }
                else
                {
                    $kd = $prx.$insert."000001";
                }
                // dd($kd);

                    $protel = new Produksi_Telur;
                        $protel->no_produksi = $kd;
                        $protel->ttl_tiap_kdng = $hasil_telur;
                        $protel->ttl_berat_tiap_kdng = $hasil_berat_telur;
                        $protel->save();
            }

            $select = DB::table('total_telurs');
            if (empty($select->count())) {
                $total_telur = Total_Telur::updateOrcreate(
                    [ 'id' => 1],
                    [ 
                        'total_seluruh_telur' => $jumlah_telur, 
                        'total_berat_seluruh_telur' => $jumlah_berat_telur,
                        'pembuat' => Auth::user()->name,
                    ]
                );
                $simpan = $total_telur->save();
            }
            else{
                $table_total_tlr = $select->first();
                $total_telur = Total_Telur::updateOrcreate(
                    [ 'id' => 1],
                    [ 
                        'total_seluruh_telur' => $jumlah_telur + $table_total_tlr->total_seluruh_telur, 
                        'total_berat_seluruh_telur' => $jumlah_berat_telur + $table_total_tlr->total_berat_seluruh_telur,
                        'pembuat' => Auth::user()->name,
                    ]
                );
                $simpan = $total_telur->save();
            }

            if($simpan){
                Session::flash('success', 'Pengisian Data Produksi Telur Berhasil!');
                return redirect()->route('dash/produksi_telur');
            } else {
                Session::flash('pesan', 'Pengisian Data Produksi Telur Gagal! Silahkan ulangi lagi');
                return redirect()->route('dash/produksi_telur');
            }
        }
        else{
            Session::flash('pesan', 'Maaf Data Ini Sudah Pernah Diinputkan Hari Ini');
            return redirect()->route('dash/produksi_telur');
        }
    }
}
