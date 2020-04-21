<?php

use App\Support\View;
use App\Support\Route;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;

Route::get('/test', function (\Boot\Foundation\Mail\Mailable $mail, $response) {
    $successful = $mail->send();

    $response->getBody()->write("Successfully sent email: {$successful}");

    return $response;
});
Route::get('/', fn (View $view) => $view('welcome'));

/* 1 Have user confirm they want to reset their password */
Route::get('/reset-password', 'ResetPasswordController@send')->add(RedirectIfAuthenticated::class);

/* 2. Persist unique reset password link into database AND send email with reset password form link */
Route::post('/reset-password', 'ResetPasswordController@store')->add(RedirectIfAuthenticated::class);

/* 3. Confirm Page, Informing User Reset Password Link Was Sent To Their Email */
Route::get('/reset-password/confirm', 'ResetPasswordController@confirm')->add(RedirectIfAuthenticated::class);

/* 4. When redirected back to our application, via the clicked link we email
      the user.
        A. Validate the reset key exists
        B. Direct the user to the reset password form
*/
Route::get('/reset-password/{key}', 'ResetPasswordController@show')->add(RedirectIfAuthenticated::class);

/* 5 Post & store/update reset password */
Route::post('/reset-password/{key}', 'ResetPasswordController@update')->add(RedirectIfAuthenticated::class);

Route::get('/logout', 'LoginController@logout')->add(RedirectIfGuest::class);
Route::get('/login', 'LoginController@show')->add(RedirectIfAuthenticated::class);
Route::post('/login', 'LoginController@store')->add(RedirectIfAuthenticated::class);

Route::get('/home', 'DashboardController@home')->add(RedirectIfGuest::class);
Route::get('/register', 'RegisterController@show')->add(RedirectIfAuthenticated::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticated::class);

Route::get('/welcome/{name}', 'WelcomeController@index');
Route::get('/welcome/{name}/{id}', 'WelcomeController@show');
