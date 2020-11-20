<?php

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
Route::group(['middleware' => ['auth','checkRole:pengguna']], function(){
  Route::get('/pencarian/{Lapangan}/detail/konfirmasi-pemesanan', 'userController@orderConfirmation');
  Route::post('/pencarian/{Lapangan}/detail/pembayaran', 'userController@payment');
  Route::get('/{order}/pembayaran', 'userController@showPayment');
  Route::get('/riwayat', 'userController@history');
  Route::get('/riwayat/{order}/detail', 'userController@orderDetail');
  Route::post('/riwayat/{order}/detail/upload','userController@payment_file_upload');
});

Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@showRegister');
Route::post('/register', 'AuthController@register');
Route::get('/register/mitra', 'AuthController@showRegisterMitra');
Route::post('/register/mitra', 'AuthController@registerMitra');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin_tempat']], function(){
  Route::get('/mitra/dashboard','dashboardController@show_dashboard_mitra');
  Route::get('/mitra/lapangan','LapanganController@index');
  Route::get('/mitra/lapangan/tambah', 'LapanganController@create');
  Route::post('/mitra/lapangan','LapanganController@store');
  Route::get('/mitra/lapangan/{Lapangan}/lihat', 'LapanganController@show');
  Route::get('/mitra/lapangan/{Lapangan}/ubah', 'LapanganController@edit');
  Route::post('/mitra/lapangan/{Lapangan}/update', 'LapanganController@update');
  Route::get('/mitra/lapangan/{Lapangan}/hapus', 'LapanganController@destroy');
  Route::get('/mitra/Orders','OrderController@index_mitra');
  Route::get('/mitra/Orders/{order}/lihat','OrderController@show_order_detail_mitra');
  Route::post('/mitra/Orders/{order}/Ubah-Status','OrderController@order_status_change_confirmed');
});

Route::group(['middleware' => ['auth','checkRole:superadmin']], function(){
  Route::get('/admin/dashboard','dashboardController@show_dashboard_superadmin');
  Route::get('/admin/Orders','OrderController@index_superadmin');
  Route::get('/admin/Orders/{order}/lihat','OrderController@show_order_detail_admin');
  Route::post('/admin/Orders/{order}/Ubah-Status','OrderController@payment_status_change');
  // Route::get('status_filtering','OrderController@status_filter');
});

Route::get('/', 'userController@index')->name('home');
Route::post('/pencarian', 'userController@searchResult');
Route::get('/pencarian/{Lapangan}/detail', 'userController@resultDetail');
Route::get('/verify','AuthController@verifyUser');
