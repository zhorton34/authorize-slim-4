<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Support\View;
use App\ResetPassword;
use App\Support\RequestInput;
use Boot\Foundation\Mail\Mailable;

class ResetPasswordController
{
    public function send(View $view)
    {
        return $view('auth.send-reset-password-link');
    }

    public function confirm(View $view)
    {
        return $view('auth.sent-reset-password-link-successfully');
    }

    public function store(Mailable $mail, View $view, RequestInput $input)
    {
        $rules = ['email' => 'required|email|exists:users,email'];
        $invalid = session()->validator($input->all(), $rules)->fails();

        if ($invalid) return back();

        /**
         * Persist Encrypted Reset Password Data
         */
        $user = User::where('email', $input->email)->first();
        $reset_key = sha1($user->email . $user->password . Carbon::now());
        ResetPassword::create(['user_id' => $user->id, 'key' => $reset_key]);

        /**
         * Send Reset Password Link To User Via Email
         */
        $reset_url = config('app.url') . "/reset-password/{$reset_key}";

        $mail->view('mail.auth.reset', compact('reset_url'))
            ->to($user->email, "{$user->first_name} {$user->last_name}")
            ->from('admin@slim.auth', 'Admin')
            ->subject('Link To Reset Your Password')
            ->send();

        /**
         * Inform The User That The Reset Password Link Has Successfully Been Sent
         */
        return redirect('/reset-password/confirm');
    }

    public function show(View $view, RequestInput $input, $key)
    {
        $validation = session()->validator($input->all(), [
            'key' => 'exists:reset_passwords,key'
        ]);

        if ($validation->fails()) return redirect('/login');

        return $view('auth.reset-password', compact('key'));
    }

    public function update(RequestInput $input, $key)
    {
        $rules = [
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required'
        ];

        $messages = [
            'password.same' => ':attribute does not match :same',
            'password.required_with' => ':attribute needs :required_with to properly validate',
            'confirm_password.required' => ':attribute is required',
            'confirm_password.string' => ':attribute must be a string'
        ];

        $validator = session()->validator($input->all(), $rules, $messages);

        if ($validator->fails()) return back();

        $reset_password = ResetPassword::where('key', $key)->first();
        $user = $reset_password->user;

        $user->password = sha1($input('password'));
        $successful = $user->save();

        if ($successful) {
            $reset_password->delete();

            return redirect('/login');
        }

        return back();
    }
}
