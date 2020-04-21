<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Support\View;
use App\ResetPassword;
use Boot\Foundation\Mail\Mailable;
use App\Http\Requests\ShowResetPasswordRequest;
use App\Http\Requests\StoreResetPasswordRequest;
use App\Http\Requests\UpdateResetPasswordRequest;

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

    public function store(StoreResetPasswordRequest $input, Mailable $mail)
    {
        if ($input->failed()) return back();

        $now = Carbon::now();
        $url = config('app.url');
        $user = User::where('email', $input->email)->first();

        $user_id = $user->id;
        $key = sha1($user->email . $user->password . $now);
        $reset_password_attributes = compact('user_id', 'key');

        ResetPassword::create($reset_password_attributes);

        $mail->to($user->email, $user->first_name)
            ->from('admin@slim.auth', 'Admin')
            ->view('mail.auth.reset', ['url' => "{$url}/reset-password/{$key}"]);

        $mail->subject('Reset Your Password Link')->send();

        return redirect('/reset-password/confirm');
    }

    public function show(View $view, ShowResetPasswordRequest $input, $key)
    {
        if ($input->failed()) return back();

        return $view('auth.reset-password', compact('key'));
    }

    public function update(UpdateResetPasswordRequest $input, $key)
    {
        if ($input->failed()) return back();

        $reset = ResetPassword::where('key', $key)->first();
        $user = $reset->user;

        $user->password = sha1($input('password'));
        $successful = $user->save();

        if ($successful) {
            $reset->where('key', $key)->each(fn ($resetting) => $resetting->delete());

            return redirect('/login');
        }

        session()->flash()->set('errors', ['Was not able to successfully reset user password']);

        return back();
    }
}
