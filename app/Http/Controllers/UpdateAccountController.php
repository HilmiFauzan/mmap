<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;

class UpdateAccountController extends Controller
{
    
    public function update_account_image(Request $request){
        $rules = [
            'image'  => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ];

        $messages = [
            'image.required'    => 'Gambar wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if(!empty($request->image)){

            if (Auth::user()->file != "images/user-thumbnail.png") {
                if (substr(Auth::user()->file, 0, 7) == "images/" ) {
                    Storage::delete(Auth::user()->file);                
                }
            }
            
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $storeAs_nama = $file->storeAs('images', $nama_file);

            $akun = User::where('id', Auth::user()->id)->first();
                $akun->file = $storeAs_nama;
                $simpan = $akun->save();
        }

        if(empty($simpan)){
            return redirect()->route('update_account_form');
        } else {
            return redirect()->route('update_account_form');
        }
    }

    public function update_account(Request $request)
    {
        $rules = [
            'nama_awal'             => 'required|min:3|max:15',
            'nama_akhir'            => 'required|min:3|max:10',
            'email'                 => 'required|email',
            'password'              => 'confirmed',
        ];

        $messages = [
            'nama_awal.required'    => 'Nama Awal wajib diisi',
            'nama_akhir.required'   => 'nama_akhir wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
        ];   

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
        }


            $akun = User::where('id', Auth::user()->id)->first();
                $akun->name = ucwords(strtolower($request->nama_awal));
                $akun->name_end = ucwords(strtolower($request->nama_akhir));
                $akun->email = strtolower($request->email);
                if (!empty($request->password)) {
                    $akun->password = Hash::make($request->password);
                }
                $simpan = $akun->save();

        if($simpan){
            return redirect()->route('update_account_form');
        } else {
            return redirect()->route('update_account_form');
        }
    }
}
