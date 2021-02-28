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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
# ルーティング
Route::get('tests/test', 'TestController@index');
// Route::get('contact/index', 'ContactFormController@index');

#login認証されていたら表示する
Route::group(
    ['prefix' => 'contact', 'middleware' => 'auth'],
    function () {
        Route::get('index', 'ContactFormController@index')->name('contact.index');
        Route::get('create', 'ContactFormController@create')->name('contact.create');
        Route::post('store', 'ContactFormController@store')->name('contact.store');
        Route::get('show/{id}', 'ContactFormController@show')->name('contact.show');
        // Route::get('{id}/edit', 'ContactFormController@edit')->name('contact.edit');
        Route::get('edit/{id}', 'ContactFormController@edit')->name('contact.edit');
    }
);

Auth::routes();

// Route::resource('contacts', 'ContactFormController')->only(['index', 'show']);

Route::get('/home', 'HomeController@index')->name('home');
