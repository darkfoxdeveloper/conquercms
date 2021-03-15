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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Controller@Home')->name('home');
    Route::get('/home', 'Controller@Home');
    Route::get('/register', 'Controller@Register')->name('register');
    Route::get('/change-password', 'Controller@ChangePassword')->name('change-password');
    Route::post('/register', 'Controller@PostRegister');
    Route::post('/change-password', 'Controller@PostChangePassword');
    Route::get('/downloads', 'Controller@Downloads');
    Route::get('/shop', 'Controller@Shop');

    Route::post('/setup', 'Controller@PostSetup');

    Route::get('login', 'ConquerAuthController@login')->name('login');
    Route::post('login', 'ConquerAuthController@postLogin');
    Route::get('logout', 'ConquerAuthController@logout')->name('logout');

    // Ranking
    Route::get('ranking', 'Controller@ranking');

    Route::get('/lang/{locale}', function ($locale) {
        if (in_array($locale, \Illuminate\Support\Facades\Config::get('app.locales'))) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    });
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
