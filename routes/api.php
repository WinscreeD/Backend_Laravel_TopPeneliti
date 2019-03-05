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

Route::post('/login', 'ApiAuthController@login');

//home
Route::get('/gethome', 'ApiHomeController@index');

//peneliti
Route::get('/getpeneliti', 'ApiPenelitiController@index');
Route::get('/getdetailpeneliti/{id}', 'ApiPenelitiController@detail_peneliti');
Route::get('/filterkegiatan/{id}/{filter}', 'ApiPenelitiController@filterKegiatan');
Route::get('/filterkegiatan2/{id}/{filter}', 'ApiPenelitiController@filterKegiatan2');
Route::get('/getkegiatan/{id}', 'ApiPenelitiController@getkegiatan');
Route::get('/getkegiatan2/{id}', 'ApiPenelitiController@getkegiatan2');

//kegiatan
Route::get('/getpenelitian', 'ApiKegiatanController@penelitian');
Route::get('/getkerjasama', 'ApiKegiatanController@kerjasama');
Route::get('/getpengmas', 'ApiKegiatanController@pengmas');
Route::get('/getseminar', 'ApiKegiatanController@seminar');

//detail
Route::get('/getdetailkegiatan/{id}', 'ApiKegiatanController@detailKegiatan');

//publikasi
Route::get('/getpublikasi', 'ApiPublikasiController@publikasi');
//detail
Route::get('/getdetailbuku/{id}', 'ApiPublikasiController@detailbuku');
Route::get('/getdetailjurnal/{id}', 'ApiPublikasiController@detailjurnal');
