<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\UpdateAccountController;
use App\Http\Controllers\KualitasController;
use App\Http\Controllers\RekapitulasiController;
use Carbon\Carbon;
// Carbon::setWeekStartsAt(Carbon::SUNDAY);
// Carbon::setWeekEndsAt(Carbon::SATURDAY);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/', [DashboardController::class, 'menu_utama'])->name('main');

Route::get('/information', function () {
    return view('layouts/informasi');
});

Route::get('/data', function () {
    return view('layouts/data');
});

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');

Route::get('/signin', [AuthController::class, 'showFormLogin'])->name('partials/signin');
Route::post('/signin', [AuthController::class, 'signIn']);

Route::get('/register', [AuthController::class, 'showFormRegister'])->name('partials/register');
Route::post('/register', [AuthController::class, 'register']);


 
Route::group(['middleware' => 'auth'], function () {

    // ----- dashboard/ form grafik -------    
    Route::get('/dashboard/grafik_produksi', [GrafikController::class, 'viewGrafikProduksi'])->name('dash/grafik_produksi_telur');

    Route::get('/dashboard/grafik_produksi/check', function(){

        if (Auth::user()->hak_akses != "member") {
            $data = "dashboard/master";
        }
        else{
            $data = "dashboard/master_customer";
        }

        $kandang = request()->kandang_produksi;
        $produksi_telur = DB::table('produksi_telurs')
            // ->whereMonth('created_at', date('m'))

            // ->selectRaw('SUBSTR(no_produksi, 1, 5) as no')
            // ->groupBy('no_produksi')
            // ->having('SUBSTR(no_produksi, 1, 5)', '=', '10')
            // ->get();

            // ->where('no_produksi', '=', request()->kandang_produksi, 'AND', 'no_produksi','LIKE','TLR'. request()->kandang_produksi .'%')

            ->where('no_produksi','LIKE','TLR'. request()->kandang_produksi .'%')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
            // dd($produksi_telur);
        

        $perbandingan_sebelum = DB::table('total_telurs')
            ->select('total_seluruh_telur')
            ->get();
        $perbandingan_sesudah = DB::table('kualitas_telurs')
            ->sum('kualitas_telur');
        //dd($perbandingan_sebelum);

        return view('dashboard/dashboard_content/grafik/grafik_produksi_telur', [
            'produksi_telurs' => $produksi_telur,
            'data' => $data,
            'kandang' => $kandang,
            'sebelum' => $perbandingan_sebelum,
            'sesudah' => $perbandingan_sesudah
        ]);
    })->name('dash/check_grafik_produksi_telur');


    Route::get('/dashboard/grafik_harga_telur', [GrafikController::class, 'viewGrafikHarga'])->name('dash/grafik_harga_telur');
    Route::get('/dashboard/grafik_jenis_telur', [GrafikController::class, 'viewPelanggan'])->name('dash/grafik_pelanggan');


    // ----- dashboard/ update akun -------
        //--- admin ----
    Route::get('/dashboard/update_account', [AuthController::class, 'form_account'])->name('update_account_form');
        //--- admin ----

    Route::put('/dashboard/update_account_image', [UpdateAccountController::class, 'update_account_image'])->name('dash/update_account_image');
    Route::put('/dashboard/update_account_form', [UpdateAccountController::class, 'update_account'])->name('dash/update_account');

    Route::get('/dashboard/update_account/data-diri', function () {
        return view('dashboard/dashboard_content/update_partials/update-account-data-diri');
    });
    Route::get('/dashboard/update_account/alamat', function () {
        return view('dashboard/dashboard_content/update_partials/update-account-alamat');
    });

    


    // ----- dashboard/form produksi telur -------
    Route::get('/dashboard/form_produksi', [ProduksiController::class, 'produksi_telur'])->name('dash/produksi_telur');
    Route::post('/dashboard/insert/produksi_telur', [ProduksiController::class, 'insert_produksi_telur'])->name('dash/insert/produksi_telur');



    // ----- dashboard/form kualitas telur -------
    Route::get('/dashboard/form_jenis_telur', [KualitasController::class, 'form_jenis_telur'])->name('dash/form_jenis_telur');
    Route::any('/dashboard/insert/form_jenis_telur', [KualitasController::class, 'total_kualitas_telur'])->name('dash/insert/form_jenis_telur');



    // ----- /dashboard/ form harga telur -------
    Route::get('/dashboard/form_harga_telur', [TotalController::class, 'form_harga_telur'])->name('dash/harga_telur');
    Route::post('/dashboard/insert/form_harga_telur', [TotalController::class, 'harga_telur'])->name('dash/insert/form_harga_telur');


    // ----- /dashboard/ view total telur -------
    Route::get('/dashboard/view_total_berat_telur', [DashboardController::class, 'view_total_berat_telur'])->name('dash/view_total_berat_telur');
 


    // ----- /dashboard/ Tambah Kandang -------
    Route::get('/dashboard/kandang', [KandangController::class, 'kandang'])->name('kandang');
    Route::post('/dashboard/tambahkandang', [KandangController::class, 'tambahKandang'])->name('tambah/kandang');

    // ----- /dashboard/ Tambah Pelanggan -------
    Route::get('/dashboard/penjualan', [RekapitulasiController::class, 'viewInputPenjualan'])->name('dash/penjualan');
    Route::post('/dashboard/input_penjualan', [RekapitulasiController::class, 'inputPenjualan'])->name('dash/input_penjualan');


    Route::get('/dashboard/view_penjualan', [RekapitulasiController::class, 'viewDataPenjualan'])->name('dash/view_penjualan');

    // ----- /dashboard/ Total Seluruh Kandang -------
        //..............
    // ----- /dashboard/ Total Seluruh Kandang -------


    // ----- /dashboard/ Tambah Feedback -------
    Route::get('/dashboard/feedback', [FeedbackController::class, 'viewFeedBack'])->name('dash/feedback');
    Route::post('/dashboard/tambahfeedback', [FeedbackController::class, 'tambahFeedBack'])->name('dash/tambah/feedback');



    Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard/master');
    Route::get('/dashboard_customer', [DashboardController::class, 'indexCustomer'])->name('dashboard/master/customer');

    Route::get('/logout', [AuthController::class, 'logout'])->name('partials/logout');
});
