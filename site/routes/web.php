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
Route::get('/', 'Controller@Home')->name('home');
Route::get('/home', 'Controller@Home');
Route::get('/register', 'Controller@Register')->name('register');
Route::post('/register', 'Controller@PostRegister');
Route::get('/downloads', 'Controller@Downloads');
Route::get('/shop', 'Controller@Shop');

Route::post('/setup', 'Controller@PostSetup');

Route::get('login', 'ConquerAuthController@index');
Route::post('login', 'ConquerAuthController@postLogin');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, \Illuminate\Support\Facades\Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
