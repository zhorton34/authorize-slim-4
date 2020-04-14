<?php

use App\Support\View;
use App\Support\Route;

Route::get('/register', fn (View $view) => $view('auth.register'));

Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
