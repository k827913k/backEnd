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

// Route::get('/', function () {
//     return view('/content/index');
// });

Route::get('/news', 'FrontController@news'); //List Page
Route::get('/news/{id}', 'FrontController@card_detail'); //Content Page


Route::get('/', 'FrontController@index');

Route::get('/card-01', 'FrontController@news');

Route::get('/card-01/{id}', 'FrontController@card-01-detail');

Route::get('/card-02', 'FrontController@news');



//產品管理
Route::get('/product', 'FrontController@product');

Auth::routes();
//首頁
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/news/store', 'NewController@store');

//最新消息管理
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home/news', 'NewController@index'); //首頁

    Route::get('/home/news/create', 'NewController@create'); //新增
    Route::post('/home/news/store', 'NewController@store'); //儲存

    Route::get('/home/news/edit/{id}', 'NewController@edit'); //編輯
    Route::post('/home/news/update/{id}', 'NewController@update'); //更新
    Route::post('/home/news/delete/{id}', 'NewController@delete'); //刪除

});
