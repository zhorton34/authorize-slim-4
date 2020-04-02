<?php

use App\Support\Route;

Route::get('/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
