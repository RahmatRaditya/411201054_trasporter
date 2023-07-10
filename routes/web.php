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
// Route::resource('/home', 'DashboardController');
// Route::resource('/dashboard', 'DashboardController');
// Route::resource('/pengiriman', 'PengirimanController');
// Route::resource('/barang', 'BarangController');
// Route::resource('/lokasi', 'LokasiController');
// Route::resource('/kurir', 'KurirController');

Route::get('home', 'DashboardController@index')->name('home.index');
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
Route::get('pengiriman', 'PengirimanController@index')->name('pengiriman.index');
Route::get('pengiriman/create', 'PengirimanController@create')->name('pengiriman.create');
Route::post('pengiriman/store', 'PengirimanController@store')->name('pengiriman.store');
Route::get('pengiriman/edit/{id}', 'PengirimanController@edit')->name('pengiriman.edit');
Route::put('pengiriman/update/{id}', 'PengirimanController@update')->name('pengiriman.update');
Route::get('barang', 'BarangController@index')->name('barang');
Route::get('lokasi', 'LokasiController@index')->name('lokasi.index');
Route::get('lokasi/create', 'LokasiController@create')->name('lokasi.create');
Route::post('lokasi/store', 'LokasiController@store')->name('lokasi.store');
Route::get('lokasi/edit/{id}', 'LokasiController@edit')->name('lokasi.edit');
Route::put('lokasi/update/{id}', 'LokasiController@update')->name('lokasi.update');
Route::delete('lokasi/destroy/{id}', 'LokasiController@destroy')->name('lokasi.destroy');
Route::get('user', 'UserController@index')->name('user');

// Route::group(['middleware' => 'auth'], function () {
//     // Route::resource('/', DashboardController::class);
//     Route::resource('pengiriman', PengirimanController);
// });