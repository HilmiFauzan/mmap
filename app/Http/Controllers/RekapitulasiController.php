<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use App\Models\Rekap_Pelanggan;
use App\Models\Kualitas_Telur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RekapitulasiController extends Controller
{
    public function viewInputPenjualan()
    {
        $kualitas_telur = DB::table('kualitas_telurs')
            ->join('harga_telurs', 'harga_telurs.no_kualitas_tlr', 
                '=', 'kualitas_telurs.no_kualitas_tlr')
            ->select('harga_telurs.*', 'kualitas_telurs.kualitas_telur', 'kualitas_telurs.berat_kualitas_telur')
            ->get();

        // dd($kualitas_telur);
        return view('dashboard/dashboard_content/rekapitulasi_penjualan/input_penjualan', ['kualitas_telur' => $kualitas_telur]);
    }

    public function inputPenjualan(Request $request)
    {
        $rules = [
            'nama_lengkap'             => 'required|min:5',
            'berat_pembelian'          => 'required',
            'total_harga'              => 'required',
            'no_kontak'                => 'required',
            'alamat_customer'          => 'required|min:10',
        ];
        
        $messages = [
            'nama_lengkap.min'    => 'Nama Lengkap minimal perlu 5 huruf',
            'alamat_customer.min'    => 'Alamat minimal perlu 10 huruf',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $select = DB::table('kualitas_telurs')->count();
        if (empty($select)) {
            Session::flash('pesan', 'Kualitas Telur Masih Belum Diisi, Mohon Isi Terlebih Dahulu');
            return redirect()->route('dash/penjualan');
        }
        else{

            $penjualan = DB::table('kualitas_telurs')
                ->join('harga_telurs', 'harga_telurs.no_kualitas_tlr',
                    '=', 'kualitas_telurs.no_kualitas_tlr')
                ->select('harga_telurs.*', 'kualitas_telurs.*')
                ->where('harga_telur', '=', $request->kualitas)
                ->first();
            //dd($penjualan->berat_kualitas_telur);

            if ($request->jumlah_satuan_pembelian == 1) {
                $satuan = "Kg";
                $total_telur = 16 * $request->berat_pembelian;
                // 1 kg == 16 butir telur
                $total_pembelian = 1000 * $request->berat_pembelian;
                // 1000 gram (1 kg) * berat pembelian
            }
            elseif ($request->jumlah_satuan_pembelian == 20) {
                $satuan = "Peti";
                $total_telur = 16 * 20 * $request->berat_pembelian;
                // 1 kg = 16 butir telur * 20
                $total_pembelian = 1000 * 20 * $request->berat_pembelian;
                // 1000 gram (1 kg) * 20 kg * berat pembelian
            }

            if(!empty($request->kwitansi)){
                
                $file = $request->file('kwitansi');
                $nama_file = time()."_".$file->getClientOriginalName();
                $storeAs_nama = $file->storeAs('images', $nama_file);
            }

            $prx="CST";
            $jenis_kualitas = substr($penjualan->no_kualitas_tlr, -1, 1);
            $query = DB::table('rekap_pelanggans')
                ->selectRaw('MAX(RIGHT(no_customer,5)) as kd_max');
            if($query->count()>0)
            {
                foreach($query->get() as $k)
                {
                    $tmp = ((int)$k->kd_max)+1;
                    $no_customer = $prx.$jenis_kualitas.sprintf("%05s", $tmp);
                }
            }
            else
            {
                $no_customer = $prx.$jenis_kualitas."00001";
            }

            $pelanggan = new Rekap_Pelanggan;
            $pelanggan->no_customer = $no_customer;
            $pelanggan->nama_lengkap = $request->nama_lengkap;
            $pelanggan->no_kualitas_tlr = $penjualan->no_kualitas_tlr;
            $pelanggan->harga_lama = $request->kualitas;
            $pelanggan->jumlah_satuan_pembelian = $satuan;
            $pelanggan->berat_pembelian = $request->berat_pembelian;
            $pelanggan->total_harga = $request->total_harga;
            $pelanggan->no_kontak = $request->no_kontak;
            $pelanggan->alamat_customer = $request->alamat_customer;
            if(!empty($request->kwitansi)){
                $pelanggan->kwitansi = $storeAs_nama;
            }
            $pelanggan->pembuat = Auth::user()->name;
            
            if($total_pembelian <= $penjualan->berat_kualitas_telur){
                    $pelanggan->save();
    
                $kualitas_telur = Kualitas_Telur::where('no_kualitas_tlr', $penjualan->no_kualitas_tlr)->first();
    
                $kualitas_telur->kualitas_telur = $penjualan->kualitas_telur - $total_telur;
                $kualitas_telur->berat_kualitas_telur = $penjualan->berat_kualitas_telur - $total_pembelian;
                $simpan = $kualitas_telur->save();
            } else {
                Session::flash('pesan', 'Pengisian Rekapitulasi Pelanggan Gagal! Karena Pembelian Melebihi Stok Telur');
                return redirect()->route('dash/penjualan');
            }

            if($simpan){
                Session::flash('success', 'Pengisian Rekapitulasi Pelanggan Berhasil!');
                return redirect()->route('dash/penjualan');
            } else {
                Session::flash('pesan', 'Pengisian Rekapitulasi Pelanggan Gagal! Silahkan ulangi lagi');
                return redirect()->route('dash/penjualan');
            }
        }

    }

    public function viewDataPenjualan()
    {
        $rekap = DB::table('rekap_pelanggans')->get();
        return view('dashboard/dashboard_content/rekapitulasi_penjualan/view_penjualan', ['rekapitulasi' => $rekap]);
    }
}
