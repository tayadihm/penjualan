<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['role:marketing']], function () {
    Route::resource('/user', 'userController');
    Route::get('/user/hapus/{id}', 'userController@destroy');
    Route::resource('/barang', 'barangController');
    Route::get('/barang/hapus/{id}', 'barangController@destroy');
    Route::resource('/customer', 'customerController');
    Route::get('/customer/hapus/{id}', 'customerController@destroy');
    Route::resource('/akun', 'akunController');
    Route::get('/akun/hapus/{id}', 'akunController@destroy');
    Route::get('/akun/edit/{id}', 'AkunController@edit');
    Route::get('/setting','SettingController@index')->name('setting.index')->middleware('role:marketing');
    Route::post('/setting/store','SettingController@store');
    //Pemesanan
    Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi');
    Route::post('/sem/store', 'PemesananController@store');
    Route::get('/transaksi/hapus/{kd_brg}', 'PemesananController@destroy');
    //Detail Pesan
    Route::post('/detail/store', 'DetailPesanController@store');
    Route::post('/detail/simpan', 'DetailPesanController@simpan');

    //pembayaran
    Route::get('/pembayaran', 'PembayaranController@index')->name('pembayaran.pembayaran');
    Route::get('/pembayaran/bayar/{id}', 'PembayaranController@edit'); 
    Route::post('/pembayaran/store', 'PembayaranController@store');
    Route::get('/pembayaran/hapus/{no_psn}', 'PembayaranController@destroy');

    //pengiriman
    Route::get('/pengiriman', 'PengirimanController@index')->name('pengiriman.pengiriman');
});
