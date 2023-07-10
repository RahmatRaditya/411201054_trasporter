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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('home', 'DashboardController@index')->name('home.index');
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('pengiriman', 'PengirimanController@index')->name('pengiriman.index');
Route::get('pengiriman/create', 'PengirimanController@create')->name('pengiriman.create');
Route::post('pengiriman/store', 'PengirimanController@store')->name('pengiriman.store');
Route::get('pengiriman/edit/{id}', 'PengirimanController@edit')->name('pengiriman.edit');
Route::put('pengiriman/update/{id}', 'PengirimanController@update')->name('pengiriman.update');

Route::get('barang', 'BarangController@index')->name('barang.index');
Route::get('barang/create', 'BarangController@create')->name('barang.create');
Route::post('barang/store', 'BarangController@store')->name('barang.store');
Route::get('barang/edit/{id}', 'BarangController@edit')->name('barang.edit');
Route::put('barang/update/{id}', 'BarangController@update')->name('barang.update');
Route::delete('barang/destroy/{id}', 'BarangController@destroy')->name('barang.destroy');

Route::get('lokasi', 'LokasiController@index')->name('lokasi.index');
Route::get('lokasi/create', 'LokasiController@create')->name('lokasi.create');
Route::post('lokasi/store', 'LokasiController@store')->name('lokasi.store');
Route::get('lokasi/edit/{id}', 'LokasiController@edit')->name('lokasi.edit');
Route::put('lokasi/update/{id}', 'LokasiController@update')->name('lokasi.update');
Route::delete('lokasi/destroy/{id}', 'LokasiController@destroy')->name('lokasi.destroy');

Route::get('user', 'UserController@index')->name('user.index');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('user/update/{id}', 'UserController@update')->name('user.update');
Route::delete('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');