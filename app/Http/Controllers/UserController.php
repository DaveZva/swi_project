<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Přihlášení úspěšné
            return redirect()->intended('/dashboard');
        } else {
            // Přihlášení neúspěšné
            return redirect()->back()->withErrors(['message' => 'Neplatné přihlašovací údaje']);
        }
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        Auth::login($user);

        if ($user) {
            Auth::login($user);
            return redirect()->back();
        } else {
            // Handle bad data or registration failure
            return redirect()->back()->withErrors(['message' => 'Registration failed']);
        }
    }

    public function attempt($credentials) {
        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }
}
