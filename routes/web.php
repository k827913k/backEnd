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

//Infor
Route::get('/news', 'FrontController@news'); //List Page
Route::get('/news/{id}', 'FrontController@card_detail'); //Content Page


//Product
Route::get('/product', 'FrontController@product'); //List Page


// ------------------------------------------------------------------------------

Route::get('/', 'FrontController@index');

Route::get('/card-01', 'FrontController@news');

Route::get('/card-01/{id}', 'FrontController@card-01-detail');

Route::get('/card-02', 'FrontController@news');



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



    //產品管理
    Route::get('/home/Product', 'ProductController@index'); //首頁
    Route::get('/home/Product/create', 'ProductController@create'); //新增
    Route::post('/home/Product/store', 'ProductController@store'); //儲存
    Route::get('/home/Product/edit/{id}', 'ProductController@edit'); //編輯
    Route::post('/home/Product/update/{id}', 'ProductController@update'); //更新
    Route::post('/home/Product/delete/{id}', 'ProductController@delete'); //刪除



    //產品類型管理
    Route::get('/home/ProductType', 'ProductTypeController@index'); //首頁
    Route::get('/home/ProductType/create', 'ProductTypeController@create'); //新增
    Route::post('/home/ProductType/store', 'ProductTypeController@store'); //儲存
    Route::get('/home/ProductType/edit/{id}', 'ProductTypeController@edit'); //編輯
    Route::post('/home/ProductType/update/{id}', 'ProductTypeController@update'); //更新
    Route::post('/home/ProductType/delete/{id}', 'ProductTypeController@delete'); //刪除

});
