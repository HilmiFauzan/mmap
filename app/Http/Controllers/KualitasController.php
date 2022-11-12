<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;
use App\Models\Kualitas_Telur;
use App\Models\Total_Telur;

class KualitasController extends Controller
{    
    public function form_jenis_telur()
    {
        $select = DB::table('produksi_telurs')->count();
        if (empty($select)) {
            $total_telur = 0;
            $total_berat_telur = 0;
        }
        else{
            $total_telur = DB::table('total_telurs')->sum('total_seluruh_telur');
            $total_berat_telur = DB::table('total_telurs')->sum('total_berat_seluruh_telur');
        }

        return view('dashboard/dashboard_content/form_partials/form-jenis-telur', ['total_telur' => $total_telur, 'total_berat_telur' => $total_berat_telur]);
    }

    public function total_kualitas_telur(Request $request)
    {
        $jumlah_telur = 0;
        $jumlah_berat_telur = 0;

        for ($insert=1; $insert <= 3 ; $insert++) {
            $validateData = $request->validate([
                        'telur'.$insert => 'required',
                        'berat'.$insert => 'required'
            ]);
        }

        for ($insert=1; $insert <= 3 ; $insert++) {

                $hasil_telur = $request->input('telur'.$insert);
                $jumlah_telur += $hasil_telur;
                // dump($hasil_telur);
                $hasil_berat_telur = $request->input('berat'.$insert);
                $jumlah_berat_telur += $hasil_berat_telur;
                // dump($hasil_berat_telur);


                $kd = 'KLTS00'.$insert;
                $select = DB::table('kualitas_telurs');
                
                    $kual_tlr = $select->select('kualitas_telur')->where('id', $insert)->first();
                    $berat_kual_tlr = $select->select('berat_kualitas_telur')->where('id', $insert)->first();

                    if (empty($kual_tlr) && empty($berat_kual_tlr)) {
                        $hasil_kualitas_telur = $hasil_telur + 0;
                        $hasil_berat_kualitas_telur = $hasil_berat_telur + 0;
                    }
                    else{
                    $hasil_kualitas_telur = $hasil_telur + $kual_tlr->kualitas_telur;
                    // dump($hasil_kualitas_telur);
                    $hasil_berat_kualitas_telur = $hasil_berat_telur + $berat_kual_tlr->berat_kualitas_telur;
                    // dump($hasil_kualitas_telur);
                    }

                    $kualitas_telur = Kualitas_Telur::updateOrcreate([ 'id' => $insert],
                        [
                            'no_kualitas_tlr' => $kd,
                            'kualitas_telur' => $hasil_kualitas_telur,
                            'berat_kualitas_telur' => $hasil_berat_kualitas_telur,
                            'pembuat' => Auth::user()->name,
                        ]);   
                
                $kualitas_telur->save();
            }

            $select = DB::table('total_telurs');
        
            $table_total_tlr = $select->first();
            $total_telur = Total_Telur::where('id', 1)->first();
                $total_telur->total_seluruh_telur = $table_total_tlr->total_seluruh_telur - $jumlah_telur;
                $total_telur->total_berat_seluruh_telur = $table_total_tlr->total_berat_seluruh_telur - $jumlah_berat_telur;
                $total_telur->pembuat = Auth::user()->name;

            $simpan = $total_telur->save();

        return redirect()->back()->with('success','Kualifikasi Data Kualitas Telur berhasil!');
    }
}
