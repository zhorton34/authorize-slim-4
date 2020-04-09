<?php

use App\Support\View;
use App\Support\Route;

Route::get('/welcome/{id}', 'WelcomeController@index');

Route::get('/welcome/{name}/{id}', 'WelcomeController@show');

Route::get('/', fn (View $view) => $view('welcome'))->setName('welcome');
