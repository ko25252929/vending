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

//一覧画面
Route::get('/home', 'HomeController@index')->name('home');

//検索
Route::get('/search', 'HomeController@search')->name('search');


//投稿フォーム
Route::get('/create', 'ProductController@showCreate')->name('create');

//投稿登録
Route::post('/store', 'ProductController@exeStore')->name('store');



//詳細画面を表示
Route::get('/product/{id}', 'ProductController@showDetail')->name('detail');

//編集画面
Route::get('/edit/{id}', 'ProductController@showEdit')->name('edit');
Route::match(['post','patch'],'update', 'ProductController@exeUpdate')->name('update');

//削除処理
Route::post('/delete/{id}', 'ProductController@exeDelete')->name('delete');
Auth::routes();