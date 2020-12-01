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
    return redirect('login');
});

Route::get('/home', function () {
    return view('index');
});

Auth::routes();

Route::get('agama', 'AgamaController@index')->name('agama.index');
Route::get('agama/create', 'AgamaController@agama_create');
Route::post('agama/store', 'AgamaController@agama_store');
Route::get('agama/edit/{id}', 'AgamaController@agama_edit');
Route::get('agama/delete/{id}', 'AgamaController@agama_delete');
Route::post('agama/update/{id}', 'AgamaController@agama_update');
Route::get('agama/check_agama', 'AgamaController@checkagama');

Route::get('kategori', 'KategoriController@index')->name('kategori.index');
Route::get('kategori/create', 'KategoriController@kategori_create');
Route::post('kategori/store', 'KategoriController@kategori_store');
Route::get('kategori/edit/{id}', 'KategoriController@kategori_edit');
Route::get('kategori/delete/{id}', 'KategoriController@kategori_delete');
Route::post('kategori/update/{id}', 'KategoriController@kategori_update');
Route::get('kategori/check_kategori', 'KategoriController@checkkategori');

Route::get('kk', 'KkController@index')->name('kk.index');
Route::get('kk/create', 'KkController@kk_create');
Route::post('kk/store', 'KkController@kk_store');
Route::get('kk/edit/{id}', 'KkController@kk_edit');
Route::get('kk/delete/{id}', 'KkController@kk_delete');
Route::post('kk/update/{id}', 'KkController@kk_update');

Route::get('penduduk', 'PendudukController@index')->name('penduduk.index');
Route::get('penduduk/create', 'PendudukController@penduduk_create');
Route::post('penduduk/store', 'PendudukController@penduduk_store');
Route::get('penduduk/edit/{id}', 'PendudukController@penduduk_edit');
Route::get('penduduk/delete/{id}', 'PendudukController@penduduk_delete');
Route::post('penduduk/update/{id}', 'PendudukController@penduduk_update');
