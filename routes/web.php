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

# /resources/views/welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

# ルーティング
Route::get('tests/test', 'TestController@index');