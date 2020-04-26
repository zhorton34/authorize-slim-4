<?php

use App\Support\View;
use App\Support\Route;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;

Route::get('/', fn (View $view) => $view('welcome'));
Route::get('/home', 'DashboardController@home')->add(RedirectIfGuest::class);

/**
 * Auth Routes
 */
Route::get('/logout', 'LoginController@logout')->add(RedirectIfGuest::class);
Route::get('/login', 'LoginController@form')->add(RedirectIfAuthenticated::class);
Route::post('/login', 'LoginController@login')->add(RedirectIfAuthenticated::class);

Route::get('/register', 'RegisterController@form')->add(RedirectIfAuthenticated::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticated::class);

Route::get('/reset-password', 'ResetPasswordController@send')->add(RedirectIfAuthenticated::class);
Route::post('/reset-password', 'ResetPasswordController@store')->add(RedirectIfAuthenticated::class);
Route::get('/reset-password/confirm', 'ResetPasswordController@confirm')->add(RedirectIfAuthenticated::class);
Route::get('/reset-password/{key}', 'ResetPasswordController@show')->add(RedirectIfAuthenticated::class);
Route::post('/reset-password/{key}', 'ResetPasswordController@update')->add(RedirectIfAuthenticated::class);
