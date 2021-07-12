<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetPassword()
    {
        return view('auth.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user)
        {
            $user->password_reset_token = Str::random(40);
            $user->password_reset_expired = now()->addMinutes(60);
            $user->save();

            $mail = new ResetPasswordMail($user);
            alert()->success('Congrats', 'Mail sent')->showConfirmButton('OK', '#3085d6');
            Mail::to($user->email)->send($mail);
            return redirect()->route('login');
        }

    }

    public function showResetPasswordForm(Request $request)
    {

    }

    public function resetPasswordForm(Request $request)
    {
        $token = $request->token;
        $email = $request->mail;
        $password = $request->password;

        $user = User::where('email', $email)->where('password_reset_token', $token)->where('password_reset_expired','>',now())
        ->first();

        if ($user)
        {
            $user->password = bcrypt($password);
            $user->save();
            Auth::login($user);
            alert()->success('Congrats', 'Redirecting...')->showConfirmButton('OK','#3085d6');
            return redirect()->route('admin.index');
        }
    }
}
