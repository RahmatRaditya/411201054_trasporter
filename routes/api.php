<?php

use Illuminate\Http\Request;

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
Route::post('login', 'AuthController@login');


Route::group([

    'middleware' => ['api', 'jwt.verify'],

], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('getBarang', 'BarangController@getBarang');
    Route::post('createBarang', 'BarangController@createBarang');
    Route::post('updateBarang', 'BarangController@updateBarang');
    Route::get('deleteBarang/{id}', 'BarangController@deleteBarang');
    Route::get('getLokasi', 'LokasiController@getLokasi');
    Route::post('createLokasi', 'LokasiController@createLokasi');
    Route::post('updateLokasi', 'LokasiController@updateLokasi');
    Route::get('deleteLokasi/{id}', 'LokasiController@deleteLokasi');
    Route::get('getPengiriman', 'PengirimanController@getPengiriman');
    Route::post('createPengiriman', 'PengirimanController@createPengiriman');
    Route::post('updatePengiriman', 'PengirimanController@updatePengiriman');
    Route::get('deletePengiriman/{id}', 'PengirimanController@deletePengiriman');
    Route::post('approvePengiriman', 'PengirimanController@approvePengiriman');
    Route::get('getKurir', 'UserController@getKurir');
    Route::post('createKurir', 'UserController@createKurir');
    Route::post('updateKurir', 'UserController@updateKurir');
    Route::get('deleteKurir/{id}', 'UserController@deleteKurir');
});

Route::post('users', 'UserController@store');
Route::get('users', 'UserController@index');