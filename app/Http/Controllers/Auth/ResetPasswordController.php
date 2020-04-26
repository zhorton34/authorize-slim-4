<?php


namespace App\Http\Controllers\Auth;


use App\Http\Requests\StoreResetPasswordRequest;
use App\Http\Requests\UpdateResetPasswordRequest;
use App\ResetPassword;
use App\Support\RequestInput;
use App\Support\View;
use App\User;
use Boot\Foundation\Mail\Mailable;
use Carbon\Carbon;

class ResetPasswordController
{
    public function send(View $view)
    {
        return $view('auth.send-reset-password-link');
    }

    public function store(StoreResetPasswordRequest $input, Mailable $mail)
    {
        if ($input->failed()) return back();

        $now = Carbon::now();
        $url = config('app.url');
        $user = User::where('email', $input->email)->first();

        $user_id = $user->id;
        $key = sha1($user->email . $user->password . $now);

        ResetPassword::create(compact('key', 'user_id'));

        $mail->to($user->email, $user->first_name)
             ->from('admin@slim.auth', 'Slim Authentication')
             ->view('mail.auth.reset', [
                 'url' => "{$url}/reset-password/{$key}"
             ]);

        $mail->subject('Reset Your Password')->send();

        return redirect('/reset-password/confirm');
    }

    public function confirm(View $view)
    {
        return $view('auth.sent-reset-password-link-successfully');
    }

    public function show(View $view, $key)
    {
        return $view('auth.reset-password', compact('key'));
    }

    public function update(UpdateResetPasswordRequest $input, $key)
    {
        if ($input->failed()) return back();

        $reset = ResetPassword::where('key', $key)->first();

        $user = $reset->user;

        $user->password = sha1($input->password);
        $successful = $user->save();

        if ($successful) {
            ResetPassword::where('key', $key)->each(fn ($reset) => $reset->delete());

            return redirect('/login');
        }

        event()->fire('flash.error', [
            'Whoops, password was not able to be reset for unknown reasons'
        ]);

        return back();
    }
}
