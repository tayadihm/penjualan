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
    return view('home');
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
    //Pemesanan
    Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi');
    Route::post('/sem/store', 'PemesananController@store');
    Route::get('/transaksi/hapus/{kd_brg}', 'PemesananController@destroy');
    //Detail Pesan
    Route::post('/detail/store', 'DetailPesanController@store');
    Route::post('/detail/simpan', 'DetailPesanController@simpan');
});
