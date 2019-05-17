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

Route::get('/karya', 'ApiKaryaController@karya')->middleware('auth:api');

//home
Route::get('/gethome', 'ApiHomeController@index')->middleware('auth:api');

//peneliti
Route::get('/getpeneliti', 'ApiPenelitiController@index')->middleware('auth:api');
Route::get('/getfoto/{pth}', 'ApiPenelitiController@getfoto')->middleware('auth:api');
Route::get('/getdetailpeneliti/{id}', 'ApiPenelitiController@detail_peneliti')->middleware('auth:api');
Route::get('/filterkegiatan/{id}/{filter}', 'ApiPenelitiController@filterKegiatan')->middleware('auth:api');
Route::get('/filterkegiatan2/{id}/{filter}', 'ApiPenelitiController@filterKegiatan2')->middleware('auth:api');
Route::get('/getkegiatan/{id}', 'ApiPenelitiController@getkegiatan')->middleware('auth:api');
Route::get('/getkegiatan2/{id}', 'ApiPenelitiController@getkegiatan2')->middleware('auth:api');

//kegiatan
Route::get('/getpenelitian', 'ApiKegiatanController@penelitian')->middleware('auth:api');
Route::get('/getkerjasama', 'ApiKegiatanController@kerjasama')->middleware('auth:api');
Route::get('/getpengmas', 'ApiKegiatanController@pengmas')->middleware('auth:api');
Route::get('/getseminar', 'ApiKegiatanController@seminar')->middleware('auth:api');

//detail
Route::get('/getdetailkegiatan/{id}', 'ApiKegiatanController@detailKegiatan')->middleware('auth:api');

// //publikasi
// Route::get('/getpublikasi', 'ApiPublikasiController@publikasi');
// //detail
// Route::get('/getdetailbuku/{id}', 'ApiPublikasiController@detailbuku');
// Route::get('/getdetailjurnal/{id}', 'ApiPublikasiController@detailjurnal');
