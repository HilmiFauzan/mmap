<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if(Auth::user()->hak_akses != "member"){
                return redirect()->route('dashboard/master');
            }
            return redirect()->route('main');
        }
        return view('partials/login');
    }
  
    public function showFormRegister()
    {
        return view('partials/login');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:15',
            'name_end'              => 'required|min:3|max:10',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'name_end.required'     => 'Nama Lengkap wajib diisi',
            'name_end.min'          => 'Nama lengkap minimal 3 karakter',
            'name_end.max'          => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->name_end = ucwords(strtolower($request->name_end));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->file = $request->image;
        $user->hak_akses = "member";
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('partials/register');
        } else {
            Session::flash('errors', 'Register gagal! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('login');
        }
    }

    public function signIn(Request $request)
    {
        $rules = [
            'email_login'                 => 'required|email',
            'password_login'              => 'required|string'
        ];
        
        $messages = [
            'email_login.required'        => 'Email wajib diisi',
            'email_login.email'           => 'Email tidak valid',
            'password_login.required'     => 'Password wajib diisi'
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $data = [
            'email'     => $request->input('email_login'),
            'password'  => $request->input('password_login')
        ];
        
        Auth::attempt($data);
        
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('login');
            // return redirect()->route('dashboard/master');
        
        } else { // false
        
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function form_account()
    {
        if(Auth::User()->hak_akses != 'member'){
            return view('dashboard/dashboard_content/update_partials/update-account-content');
        }
        else{
            return view('dashboard/dashboard_content/customer_partials/update_account_customer');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
