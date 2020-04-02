<?php

use App\Support\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index');
