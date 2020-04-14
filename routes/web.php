<?php

use App\Support\View;
use App\Support\Route;
use App\Http\Middleware\RedirectIfGuestMiddleware;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware;

Route::get('/', fn (View $view) => $view('welcome'));

Route::get('/home', 'DashboardController@home')->add(RedirectIfGuestMiddleware::class);

Route::get('/logout', 'LogoutController@index')->add(RedirectIfGuestMiddleware::class);
Route::get('/login', 'LoginController@show')->add(RedirectIfAuthenticatedMiddleware::class);
Route::post('/login', 'LoginController@store')->add(RedirectIfAuthenticatedMiddleware::class);
Route::get('/register', 'RegisterController@show')->add(RedirectIfAuthenticatedMiddleware::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticatedMiddleware::class);


Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
