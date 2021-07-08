<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check())
        {
            return redirect()->route('index');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email',$email)->first();

        if ($user && Hash::check($password, $user->password))
        {
            Auth::login($user);
            return redirect()->route('index');
        }
        else
        {
            alert()->error('Uyarı','Kullanıcı bulunamadı.')->showConfirmButton('Tamam', '#3085d6');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
