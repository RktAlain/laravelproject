<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // User::create([
        //     'name' => 'NOMENJANAHARY Arison Nestor',
        //     'email' => 'nomenjanaharyarison303@gmail.com',
        //     'password' => Hash::make('12345678')
        // ]);


        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
    
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('auth.login')->withErrors([
            'email'=> "Email invalide"
        ])->withInput($request->only('email'));
    }
}
