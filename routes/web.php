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
// Route::group(['middleware' => ['role:Marketing']], function () {
    Route::resource('/user', 'userController')->middleware('role:Marketing|Direktur');
    Route::get('/user/hapus/{id}', 'userController@destroy')->middleware('role:Marketing|Direktur');
    Route::resource('/barang', 'BarangController')->middleware('role:Marketing');
    Route::get('/barang/hapus/{id}', 'BarangController@destroy')->middleware('role:Marketing');

    Route::resource('/customer', 'customerController')->middleware('role:Marketing');
    Route::get('/customer/hapus/{id}', 'customerController@destroy')->middleware('role:Marketing');
    Route::resource('/akun', 'akunController')->middleware('role:Keuangan');
    Route::get('/akun/hapus/{id}', 'akunController@destroy')->middleware('role:Keuangan');
    Route::get('/akun/edit/{id}', 'AkunController@edit')->middleware('role:Keuangan');
    Route::get('/setting','SettingController@index')->name('setting.index')->middleware('role:Keuangan');
    Route::post('/setting/store','SettingController@store')->middleware('role:Keuangan');

    //Pemesanan
    Route::get('/transaksi', 'PemesananController@index')->name('pemesanan.transaksi')->middleware('role:Marketing');
    Route::get('transaksi/{no_psn}/edit', 'PemesananController@index')->middleware('role:Marketing');
    Route::post('/sem/store', 'PemesananController@store')->middleware('role:Marketing');
    Route::get('/transaksi/hapus/{kd_brg}', 'PemesananController@destroy')->middleware('role:Marketing');
    Route::get('/transaksi/hapus-pemesanan/{no_psn}', 'PemesananController@hapusPemesanan')->name('transaksi.hapus')->middleware('role:Marketing');
    Route::get('/pemesanan/cetak/{no_psn}', 'PemesananController@pdf')->name('cetak.inv_pdf')->middleware('role:Marketing');
    //Detail Pesan
    Route::post('/detail/store', 'DetailPesanController@store')->middleware('role:Marketing');
    Route::post('/detail/simpan', 'DetailPesanController@simpan')->middleware('role:Marketing');

    //pembayaran
    Route::get('/pembayaran', 'PembayaranController@index')->name('pembayaran.index')->middleware('role:Keuangan');
    Route::get('/pembayaran/bayar/{id}', 'PembayaranController@edit')->name('pembayaran.bayar')->middleware('role:Keuangan'); 
    Route::post('/pembayaran/store', 'PembayaranController@store')->middleware('role:Keuangan');
    Route::get('/pembayaran/hapus/{no_psn}', 'PembayaranController@destroy')->name('pembayaran.hapus')->middleware('role:Keuangan');
    Route::get('/pembayaran/cari','PembayaranController@cari')->middleware('role:Keuangan');

    //pengiriman
    Route::get('/pengiriman', 'PengirimanController@index')->name('pengiriman.pengiriman')->middleware('role:Marketing');
    Route::get('/pengiriman/psn-cust', 'PengirimanController@getNoPsnAndCustomer')->name('pengiriman.psn-cust')->middleware('role:Marketing');
    // Route::get('/pengiriman/{nm_cust}', 'PengirimanController@getCustomer')->name('pengiriman.getCustomer')->middleware('role:Marketing');
    // Route::get('/pengiriman/{nm_cust}', 'PengirimanController@getNoPsn')->name('pengiriman.getNoPsn')->middleware('role:Marketing');
    Route::post('/pengiriman/store', 'PengirimanController@store')->middleware('role:Marketing');
    Route::get('/pengiriman/cetak/{no_kirim}', 'PengirimanController@pdf')->name('cetak.kirim_pdf')->middleware('role:Marketing');
    Route::get('/pengiriman/hapus/{no_kirim}', 'PengirimanController@destroy')->name('pengiriman.hapus')->middleware('role:Marketing');


    //laporan
    Route::get('/laporan', 'LaporanController@index')->name('laporan-jurnal')->middleware('role:Keuangan|Direktur');
    Route::get('/laporan/cetak', 'LaporanController@show')->name('laporan-cetak')->middleware('role:Keuangan|Direktur');
    Route::get('/laporan/cetak', 'LaporanController@show')->name('laporan-cetak-periode')->middleware('role:Keuangan|Direktur');
    Route::get('/laporan-penjualan', 'LaporanController@reportPenjualan')->name('laporan-penjualan')->middleware('role:Marketing|Direktur');
    Route::get('/laporan-penjualan/cetak', 'LaporanController@cetakPenjualan')->name('cetak-laporan-penjualan')->middleware('role:Marketing|Direktur');
    
    //laporan cetak
    Route::get('/laporancetak/cetak_pdf', 'LaporanController@cetak_pdf');
// });
