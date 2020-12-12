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
  Route::get('/riwayat/{order}/selesai', 'userController@order_complete');
  Route::post('/riwayat/{order}/detail/upload','userController@payment_file_upload');
  Route::get('/riwayat/{order}/detail/upload','userController@payment_file_upload');
  Route::get('/profil','profilController@show_profile_pengguna');
  Route::post('/{User}/ubah-password','profilController@password_change_pengguna');
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
  Route::get('/mitra/Orders/Online','OrderController@index_mitra_online');
  Route::get('/mitra/Orders/Online/{order}/lihat','OrderController@show_order_detail_mitra');
  Route::get('/mitra/Orders/Online/{order}/Selesai','OrderController@order_status_done');
  Route::get('/mitra/withdrawal','withdrawalController@index');
  Route::get('/mitra/withdrawal/form','withdrawalController@show_withdrawal_form');
  Route::post('/mitra/withdrawal/form','withdrawalController@submit_withdrawal_form');
  Route::get('/mitra/withdrawal/{withdrawals}/detail','withdrawalController@show_detail_mitra');
  Route::get('/mitra/profil','profilController@show_profile_mitra');
  Route::post('mitra/{User}/ubah-password','profilController@password_change_mitra');
  Route::post('mitra/{User}/ubah-status','profilController@status_change_mitra');
  Route::get('mitra/Orders/Offline/tambah','OrderController@create');
  Route::get('mitra/Orders/Offline/','OrderController@index_mitra_offline');
  Route::post('mitra/Orders/Offline/tambah','OrderController@store');
  Route::get('/mitra/Orders/Offline/{OfflineOrder}/lihat','OrderController@show_offline_order_detail_mitra');
});

Route::group(['middleware' => ['auth','checkRole:superadmin']], function(){
  Route::get('/admin/dashboard','dashboardController@show_dashboard_superadmin');
  Route::get('/admin/Orders','OrderController@index_superadmin');
  Route::get('/admin/Orders/{order}/lihat','OrderController@show_order_detail_admin');
  Route::post('/admin/Orders/{order}/Ubah-Status','OrderController@payment_status_change');
  Route::get('/admin/withdrawal','withdrawalController@index_admin');
  Route::post('/admin/withdrawal/{withdrawals}/detail/upload','withdrawalController@withdrawal_update');
  Route::get('/admin/withdrawal/{withdrawals}/detail','withdrawalController@show_detail_admin');
  Route::get('/admin/Lapangan','LapanganController@index_admin');
  Route::get('/admin/Lapangan/{Lapangan}/lihat','LapanganController@show_detail_admin');
  Route::get('/admin/Tempat','TempatController@show_place_list');
  Route::get('/admin/Pengguna','PenggunaController@show_user_list');
  Route::get('/admin/Tempat/{tempat}/detail','TempatController@show_place_detail');
  Route::get('/admin/Pengguna/{User}/detail','PenggunaController@show_user_detail');
  Route::get('/admin/Artikel','ArticleController@index');
  Route::get('/admin/Artikel/tambah','ArticleController@create');
  Route::post('/admin/Artikel/tambah','ArticleController@store');
  Route::get('/admin/Artikel/{Article}/detail','ArticleController@show');
  Route::get('/admin/Artikel/{Article}/edit','ArticleController@edit');
  Route::post('/admin/Artikel/{Article}/edit','ArticleController@update');
  Route::get('/admin/Artikel/{Article}/hapus','ArticleController@destroy');
  Route::get('/admin/profil','profilController@show_profile_admin');
  Route::post('/admin/{User}/ubah-password','profilController@password_change_admin');
});

Route::get('/', 'userController@index')->name('home');
Route::post('/pencarian', 'userController@searchResult');
Route::get('/pencarian/{Lapangan}/detail', 'userController@resultDetail');
Route::get('/verify','AuthController@verifyUser');
Route::get('/artikel/{Article}/lihat','userController@show_article_detail');
Route::get('/artikel','userController@show_article_list');
