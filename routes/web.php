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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/user_check', 'HomeController@user_check')->name('user_check');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/peneliti', 'PenelitiController@index')->name('peneliti');
Route::get('/penelitian', 'PenelitianController@index')->name('penelitian');
Route::get('/kerjasama', 'KerjasamaController@index')->name('kerjasama');
Route::get('/pengmas', 'PengmasController@index')->name('pengmas');
Route::get('/seminar_workshop', 'Seminar_WorkshopController@index')->name('seminar_workshop');
Route::get('/publikasi', 'PublikasiController@index')->name('publikasi');

Route::get('/detail_peneliti/{id}', 'PenelitiController@detail_peneliti');
Route::get('/download', 'DownloadUserGuideController@getDownload')->name('download');;
// Route::get('/export_excel','HomeController@export_excel')->name('export_excel');
