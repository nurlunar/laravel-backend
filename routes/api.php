<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/nasabah/show','NasabahController@show_nasabah');
// Route::get('/saldo/show','SaldoController@show_saldo');
// Route::get('/reward/show','RewardController@show_reward');
// Route::get('/pesanan/show','PesananController@show_pesanan');
// Route::post('/saldo/store','SimpansaldoController@store');
// Route::post('/pesanan/store_pesanan','SimpanpesananController@store_pesanan');

// Routes for admin
Route::prefix('admin')->group(function () {
    // Login
    Route::post('/login', 'LoginController@login_admin');


    // Mitra
    Route::get('/mitra_show','MitraController@mitra_show_for_admin');
    Route::get('/mitra_detail/{id}','MitraController@mitra_detail_for_admin');
    Route::post('/mitra_store','MitraController@mitra_store_for_admin');
    Route::post('/update_mitra','MitraController@mitra_update_for_admin');
    Route::post('/delete_mitra/{id}','MitraController@mitra_delete_for_admin');

    
    // Nasabah
    Route::get('/nasabah_show','NasabahController@nasabah_show_for_admin');
    Route::get('/nasabah_detail/{id}','NasabahController@nasabah_detail_for_admin');
    Route::post('/nasabah_store','NasabahController@nasabah_store_for_admin');
    Route::post('/update_nasabah/{id}','NasabahController@update_nasabah_for_admin');
    Route::post('/delete_nasabah/{id}','NasabahController@delete_nasabah_for_admin');


     // MasterSampah
     Route::get('/sampah_show','MasterSampahController@master_sampah_show_for_admin');
     Route::get('/sampah_detail/{id}','MasterSampahController@master_sampah_detail_for_admin');
     Route::post('/sampah_store','MasterSampahController@master_sampah_store_for_admin');
     Route::post('/update_sampah/{id}','MasterSampahController@master_sampah_update_for_admin');
     Route::post('/delete_sampah/{id}','MasterSampahController@master_sampah_delete_for_admin');


     // Saldo Mitra
     Route::get('/saldo_mitra_show/{mitra_id}','SaldoController@saldo_mitra_show_for_admin');
     Route::post('/saldo_mitra_store','SaldoController@saldo_mitra_store_for_admin');
     Route::post('/saldo_mitra_update','SaldoController@saldo_mitra_update_for_admin');
     //Route::post('/delete_sampah/{id}','MasterSampahController@master_sampah_delete_for_admin');

     // Saldo Nasabah
     //Route::get('/saldo_nasabah_show/{nasabah_id}','SaldoController@saldo_nasabah_show_for_admin');
     //Route::post('/saldo_nasabah_store','SaldoController@saldo_nasabah_store_for_admin');
     //Route::post('/saldo_nasabah_update/{id}','SaldoController@saldo_nasabah_update_for_admin');
 
});

Route::prefix('mitra')->group(function () {

    // Login
    Route::post('/login', 'LoginController@login_mitra');

    // saldo nasabah

    Route::get('/nasabah_show','NasabahController@nasabah_show_for_mitra');
    Route::get('/mitra_show','MitraController@mitra_show_for_mitra');
    Route::post('/saldo_nasabah_store','SaldoController@saldo_nasabah_store_for_mitra');
    Route::post('/reward_nasabah_store','RewardController@reward_nasabah_store_for_mitra');
    Route::post('/update_status_pesanan','PesananController@update_status_pesanan_for_mitra');

});

Route::prefix('nasabah')->group(function () {

    // Login
    Route::post('/login', 'LoginController@login_nasabah');

    // saldo nasabah

    Route::get('/saldo_nasabah_show/{nasabah_id}','SaldoController@saldo_nasabah_show');
    Route::get('/reward_nasabah_show/{nasabah_id}','RewardController@reward_nasabah_show');
    Route::get('/nasabah_show/{id}','NasabahController@nasabah_show');
    Route::post('/update_nasabah/{id}','NasabahController@update_nasabah');
    Route::get('/sampah_show','MasterSampahController@master_sampah_show_for_nasabah');
    Route::get('/mitra_show','MitraController@mitra_show_for_nasabah');
    Route::get('/pesanan_show','PesananController@pesanan_show');
    Route::get('/detail_pesanan_show/{id}','PesananController@pesanan_nasabah_show');
    Route::post('/update_pesanan_nasabah/{id}','PesananController@update_pesanan_nasabah');
    Route::post('/pesanan_nasabah_store','PesananController@pesanan_nasabah_store');
});

// RANGGA