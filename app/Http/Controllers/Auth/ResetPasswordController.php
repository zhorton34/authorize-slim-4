<?php


namespace App\Http\Controllers\Auth;


use App\Support\RequestInput;
use App\Support\View;

class ResetPasswordController
{
    public function send(View $view)
    {
        $view('auth.send-reset-password-link');
    }

    public function store(
        // StoreResetPasswordRequest $input,
        // Mailable $mail
    )
    {
        // 1. If input validation fails, redirect user back to password reset form

        // 2. Create a unique reset password key

        // 3. Persist or store that unique password key to the database
        //    with a relationship to our user

        // 4. Email user the reset password link

        // 5. Return Redirect the user to the reset password email sent successfully
        //    (tell the user to check their email address)
    }

    public function confirm(View $view)
    {
        return $view('auth.sent-reset-password-link-successfully');
    }

    // user opens email, and they have an email from us.
    // when they click the link in the email, they'll be redirected to the password reset form

    public function show(View $view, $key)
    {
        return $view('auth.reset-password', compact('key'));
    }

    public function update(
        // UpdateResetPasswordRequest $input,
        // $key
    ) {
        // 1. if validation failed, redirect user back to reset password form

        // 2. Find the persisted reset key within the database

        // 3. Get the user related to that key within the database

        // 4. update the user with the new password given all validations pass

        // 5. if successfully updated the user password
        //       A. delete the reset_password key
        //       B. Redirect the user back to 'login'

        // 6. If we did not successfully update the user password
        //      A. Flash errors to the session
        //      B. Return user back to the reset password form
    }
}
