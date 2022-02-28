<?php

use Illuminate\Support\Facades\Route;


//Admin
Route::prefix('admin')->middleware('isLogout')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout');
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index');


    Route::get('about', 'App\Http\Controllers\Admin\AboutController@index');
    Route::get('about/edit', 'App\Http\Controllers\Admin\AboutController@edit');
    Route::post('about/edit', 'App\Http\Controllers\Admin\AboutController@post_edit');

    Route::get('registers', 'App\Http\Controllers\Admin\RegisterController@index');
    Route::post('register/card-number', 'App\Http\Controllers\Admin\RegisterController@post_card_number');
    Route::post('register/delete', 'App\Http\Controllers\Admin\RegisterController@destroy');

    Route::get('reservations', 'App\Http\Controllers\Admin\ReserveController@index');
    Route::post('reserve/check', 'App\Http\Controllers\Admin\ReserveController@check');
    Route::post('reserve/delete', 'App\Http\Controllers\Admin\ReserveController@destroy');

    Route::get('contact', 'App\Http\Controllers\Admin\ContactController@index');
    Route::get('contact/edit', 'App\Http\Controllers\Admin\ContactController@edit');
    Route::post('contact/edit', 'App\Http\Controllers\Admin\ContactController@post_edit');


    Route::get('cards', 'App\Http\Controllers\Admin\CardController@index');
    Route::get('cards/edit/{id}', 'App\Http\Controllers\Admin\CardController@edit');
    Route::post('cards/edit/{id}', 'App\Http\Controllers\Admin\CardController@post_edit');



});

Route::prefix('admin')->middleware('isLogin')->group(function () {
    Route::get('login', 'App\Http\Controllers\Admin\LoginController@index');
    Route::post('login', 'App\Http\Controllers\Admin\LoginController@post');

});




//Front
Route::get('/', "App\Http\Controllers\Front\HomeController@index");
Route::get('/about', "App\Http\Controllers\Front\AboutController@index");
Route::post('/card-details', "App\Http\Controllers\Front\CampaignController@get_card");
Route::get('/action/{slug}', "App\Http\Controllers\Front\ActionController@show");
Route::get('/register', "App\Http\Controllers\Front\RegisterController@index");
Route::post('/register/submit', "App\Http\Controllers\Front\RegisterController@post");
Route::post('/reserve/submit', "App\Http\Controllers\Front\ReservationController@post");
Route::get('/reservation', "App\Http\Controllers\Front\ReservationController@index");
Route::post('/reserved-dates', "App\Http\Controllers\Front\ReservationController@reserved_dates");
Route::get('/campaign', "App\Http\Controllers\Front\CampaignController@index");
Route::get('/contact', "App\Http\Controllers\Front\ContactController@index");
Route::post('/contact', "App\Http\Controllers\Front\ContactController@post");
Route::get('/men-league', "App\Http\Controllers\Front\MenleagueController@index");
Route::get('/privacy-policy', "App\Http\Controllers\Front\PrivacyController@index");
Route::get('/optimize', "App\Http\Controllers\ConfigController@optimize");
Route::get('/{lang}', 'App\Http\Controllers\Front\HomeController@lang');
