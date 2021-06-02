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

Route::get('/','HomeController@index')->name('dashboard');
Route::get('/kriteria','HomeController@kriteria')->name('kriteria');
Route::post('/kriteria/edit','HomeController@editKriteria')->name('edit_kriteria');
Route::put('/kriteria/edit','HomeController@storeEditBobot')->name('store_edit_bobot');
Route::get('/pegawai','HomeController@pegawai')->name('pegawai');
Route::get('/pegawai/baru','HomeController@tambahPegawai')->name('tambah_pegawai');
Route::post('/pegawai/baru/store','HomeController@storePegawai')->name('store_pegawai');
Route::post('/pegawai/edit','HomeController@editPegawai')->name('edit_pegawai');
Route::put('/pegawai/edit','HomeController@storeEditPegawai')->name('store_edit_pegawai');
Route::delete('/pegawai/delete','HomeController@deletePegawai')->name('delete_pegawai');
Route::get('/penilaian','HomeController@penilaian')->name('penilaian');

Auth::routes();
