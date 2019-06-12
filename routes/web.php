<?php

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::post('/', 'Auth\LoginController@login')
    ->name('login');

Route::get('/', 'Auth\LoginController@showLoginForm')
    ->name('login.show');

Route::get('/logout', 'Auth\LoginController@logout')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/home', 'Home\HomeController@index')
    ->name('home.index');

/*
|--------------------------------------------------------------------------
| Cars
|--------------------------------------------------------------------------
*/

Route::get('/cars/{search}', 'Cars\CarController@search')
    ->name('cars.search');

/*
|--------------------------------------------------------------------------
| Stolen cars
|--------------------------------------------------------------------------
*/

Route::get('/stolen-cars', 'Cars\StolenCarController@index')
    ->name('stolen-car.index');

Route::get('/set-stolen/{id}', 'Cars\StolenCarController@setStolen')
    ->name('set-stolen');

Route::get('/set-unstolen/{id}', 'Cars\StolenCarController@setUnstolen')
    ->name('set-unstolen');

/*
|--------------------------------------------------------------------------
| Car history
|--------------------------------------------------------------------------
*/

Route::get('/car-history/{id}', 'Cars\CarHistoryController@show')
    ->name('car-history');

/*
|--------------------------------------------------------------------------
| Car location
|--------------------------------------------------------------------------
*/

Route::get('/car-location/{id}', 'Cars\LocationController@show')
    ->name('car-location');
