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

//ブログ一覧画面を表示
Route::get('/list', 'ProductController@showList')->name('list');

//ブログ詳細画面を表示

Route::get('/product/{id}', 'ProductController@showDetail')->name('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
