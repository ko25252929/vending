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

//投稿フォーム
Route::get('/product/create', 'ProductController@showCreate')->name('create');

//投稿登録
Route::post('/product/store', 'ProductController@exeStore')->name('store');

//削除処理
Route::post('home/destroy{id}',[ProductController::class, 'destroy'])->name('product.destroy');

//詳細画面を表示
Route::get('product/{id}', 'ProductController@showDetail')->name('show');

//編集画面
Route::get('<product><edit>{id}', 'ProductController@showEdit')->name('edit');
Route::post('/product/update', 'ProductController@exeUpdate')->name('update');

Auth::routes();