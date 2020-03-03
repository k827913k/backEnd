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


Route::get('/', 'FrontController@index');


Route::get('/card-01','FrontController@news' );

Route::get('/card-02','FrontController@news' );

Route::get('/product','ProductController@product' );




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::post('/home/news/store', 'NewController@store');

Route::group(['middleware' =>['auth']],function(){

Route::get('/home/news', 'NewController@index');

Route::get('/home/news/creat', 'NewController@creat');
Route::post('/home/news/store', 'NewController@store');

Route::get('/home/news/edit/{id}', 'NewController@edit');
Route::post('/home/news/edit/{id}', 'NewController@update');


Route::post('/home/news/delete', 'NewController@delete');

});
