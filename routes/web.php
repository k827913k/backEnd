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


Route::get('/', function () {
    return view('front/index');
});


Route::get('/card-01', function () {
    return view('front/card-01');
});

Route::get('/card-02', function () {
    return view('front/card-02');
});