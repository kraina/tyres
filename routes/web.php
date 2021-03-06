<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'SelectTyreController@index');
Route::post('/index/fetch', 'SelectTyreController@fetch')->name('index.fetch');
Route::get('/layouts/ajax_listings', 'SelectTyreController@ajax_listings')->name('ajax_listings');

Route::get('/index2', 'TyreController@index');
Route::post('/index2/fetch', 'TyreController@fetch')->name('index2.fetch');
Route::get('/layouts/ajax_listings2', 'TyreController@ajax_listings')->name('ajax_listings2');
