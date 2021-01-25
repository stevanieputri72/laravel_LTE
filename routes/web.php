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
    return view('welcome');
});

Route::get('/login', function () {
    return view('pengguna.login');
})->name('login');



Route::post('/postlogin','LoginController@postlogin')->name('postlogin');
Route::get('/logout','LoginController@logout')->name('logout');


route::group(['middleware' => ['auth','CekLevel:admin']], function(){

    Route::get('/beranda','berandaController@index');
    Route::get('/halaman-satu','berandaController@halamansatu')->name('halaman-satu');
    Route::get('/halaman-dua','berandaController@halamandua')->name('halaman-dua');
});

route::group(['middleware' => ['auth','CekLevel:admin,user']], function(){

    Route::get('/beranda','berandaController@index');
    
    Route::get('/halaman-dua','berandaController@halamandua')->name('halaman-dua');
});