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