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
  Route::get('/', 'userController@index')->name('home');
  Route::post('/pencarian', 'userController@searchResult');
});

Route::get('/login', 'AuthController@showLogin')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@showRegister');
Route::post('/register', 'AuthController@register');
Route::get('/register/mitra', 'AuthController@showRegisterMitra');
Route::post('/register/mitra', 'AuthController@registerMitra');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin_tempat']], function(){
  Route::get('/dashboard','dashboardController@index')->name('home');
  Route::get('/lapangan','LapanganController@index');
  Route::get('/lapangan/tambah', 'LapanganController@create');
  Route::post('/lapangan','LapanganController@store');
  Route::get('/lapangan/{Lapangan}/lihat', 'LapanganController@show');
  Route::get('/lapangan/{Lapangan}/ubah', 'LapanganController@edit');
  Route::post('/lapangan/{Lapangan}/update', 'LapanganController@update');
  Route::get('/lapangan/{Lapangan}/hapus', 'LapanganController@destroy');
});
