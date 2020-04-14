<?php

use App\Support\View;
use App\Support\Route;

Route::get('/', fn (View $view) => $view('welcome'));

Route::get('/login', 'LoginController@show');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@logout');

Route::get('/home', 'DashboardController@home');
Route::get('/register', 'RegisterController@show');
Route::post('/register', 'RegisterController@store');

Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
