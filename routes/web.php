<?php

use App\Support\View;
use App\Support\Route;
use Boot\Foundation\Mail\Mailable;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;

Route::get('/', fn (View $view) => $view('welcome'));

/**
 * 1. Have User Confirm They Want To Reset Their Password
 */
Route::get('/reset-password', 'ResetPasswordController@send')->add(RedirectIfAuthenticated::class);

/**
 * 2. Persist Unique Reset Password Link Into Database & And Email it to the given user
 */
Route::post('/reset-password', 'ResetPasswordController@store')->add(RedirectIfAuthenticated::class);

/**
 * 3. Confirm Reset Password Link Was Sent Successfully
 */
Route::get('/reset-password/confirm', 'ResetPasswordController@confirm')->add(RedirectIfAuthenticated::class);


/**
 * 4. When redirected back via Emailed Link, validate reset key and show password reset form
 */
Route::get('/reset-password/{key}', 'ResetPasswordController@show')->add(RedirectIfAuthenticated::class);

/**
 * 5. Update Password Based On Protected Password Reset Form
 */
Route::post('/reset-password/{key}', 'ResetPasswordController@update')->add(RedirectIfAuthenticated::class);

Route::get('/logout', 'LoginController@logout')->add(RedirectIfGuest::class);
Route::get('/login', 'LoginController@show')->add(RedirectIfAuthenticated::class);
Route::post('/login', 'LoginController@store')->add(RedirectIfAuthenticated::class);

Route::get('/home', 'DashboardController@home')->add(RedirectIfGuest::class);
Route::get('/register', 'RegisterController@show')->add(RedirectIfAuthenticated::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticated::class);

Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
