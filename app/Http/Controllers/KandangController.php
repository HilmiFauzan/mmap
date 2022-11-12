<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Models\Kandang;

class KandangController extends Controller
{

    public function kandang()
    {
        return view('dashboard/dashboard_content/form_partials/form-kandang');
    }

    public function tambahKandang(Request $request)
    {
        $rules = [
            'tambah_kandang'             => 'required'
        ];
        
        $messages = [
            'tambah_kandang.required'    => 'Tambah Kandang wajib diisi'
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->tambah_kandang == 0){
            return redirect()->back()->with('pesan','Penambahan Kandang/ Ubah Banyak Kandang Tidak Boleh Bernilai 0!');
        }


        $item = Kandang::updateOrcreate(
            [ 'id' => 1],
            [ 'mengubah' => $request->mengubah, 'banyak_kandang' => $request->tambah_kandang]
        );
        $item->save();

        return redirect()->back()->with('success','Penambahan Kandang/ Ubah Banyak Kandang berhasil!');
    }
}
