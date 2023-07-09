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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/pengiriman', 'PengirimanController@index')->name('pengiriman');
Route::get('/barang', 'BarangController@index')->name('barang');
Route::get('/lokasi', 'LokasiController@index')->name('lokasi');
Route::get('/kurir', 'KurirController@index')->name('kurir');