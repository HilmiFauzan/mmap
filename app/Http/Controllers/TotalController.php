<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;
use App\Models\Harga_Telur;

class TotalController extends Controller
{
    public function form_harga_telur()
    {
        $harga_telur = Harga_Telur::all();
        return view('dashboard/dashboard_content/form_partials/form-harga-telur', ['hargatelurs' => $harga_telur]);
    }

    public function harga_telur(Request $request)
    {
        $rules = [
            'jenis_kualitas'             => 'required',
            'harga'                      => 'required|min:4',
        ];
        
        $messages = [
            'jenis_kualitas.required'    => 'Jenis Kualitas Wajib Diisi',
            'harga.required'             => 'Harga Telur Wajib Diisi',
            'harga.number'               => 'Harga Telur Haruslah Angka',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->harga == 0){
            return redirect()->back()->with('pesan','Penambahan Kandang/ Ubah Banyak Kandang Tidak Boleh Bernilai 0!');
        }

        if ($request->jenis_kualitas == 'Kualitas Terbaik')
        {
            $id = 1;
            $kd = 'KLTS001';
        }
        elseif ($request->jenis_kualitas == 'Kualitas Medium')
        {
            $id = 2;
            $kd = 'KLTS002';
        }
        elseif ($request->jenis_kualitas == 'Kualitas Rendah')
        {
            $id = 3;
            $kd = 'KLTS003';
        }
        else{
            Session::flash('pesan', 'Pengisian Harga Telur Tidak Sesuai! Silahkan ulangi lagi');
            return redirect()->route('dash/harga_telur');
        }

        $item = Harga_Telur::updateOrcreate(
            [ 'id' => $id],
            [
                'no_kualitas_tlr' => $kd, 
                'jenis_kualitas_telur' => $request->jenis_kualitas,
                'harga_telur' => $request->harga
            ]);
        $simpan = $item->save();

        if($simpan){
            Session::flash('success', 'Pengisian Harga Telur Dengan Jenis '.$request->jenis_kualitas.' berhasil!');
            return redirect()->route('dash/harga_telur');
        } else {
            Session::flash('pesan', 'Pengisian Harga Telur Gagal! Silahkan ulangi lagi');
            return redirect()->route('dash/harga_telur');
        }
    }

}
