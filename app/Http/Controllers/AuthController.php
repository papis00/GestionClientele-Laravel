<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login')-;
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    public function connexion(LoginRequest $request)
    {
        $connecter = $request->validated();

        if (Auth::attempt($connecter)) {
            $request->session()->regenerate();
            return redirect()->route('client');
        }

        return to_route('auth.login')->withErrors([
            'email' => "Email invalide"
        ])->onlyInput('email');
    }
}
