<?php

use App\Support\View;
use App\Support\Route;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;

Route::get('/', fn (View $view) => $view('welcome'));

Route::get('/logout', 'LoginController@logout')->add(RedirectIfGuest::class);
Route::get('/login', 'LoginController@show')->add(RedirectIfAuthenticated::class);
Route::post('/login', 'LoginController@store')->add(RedirectIfAuthenticated::class);

Route::get('/home', 'DashboardController@home')->add(RedirectIfGuest::class);
Route::get('/register', 'RegisterController@show')->add(RedirectIfAuthenticated::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticated::class);

Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
