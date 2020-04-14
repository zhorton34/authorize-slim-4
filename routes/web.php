<?php

use App\Support\View;
use App\Support\Route;

Route::get('/register', fn (View $view) => $view('auth.register'));
// Route::get('/login', fn (View $view) => $view('auth.login'));

Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
