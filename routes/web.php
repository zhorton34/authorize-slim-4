<?php

use App\Support\View;
use App\Support\Route;

// $app->get('/', 'WelcomeController@index')->setName('welcome');
Route::get('/welcome/{id}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
Route::get('/', function (View $view) {
    return $view('welcome');
})->setName('welcome');
