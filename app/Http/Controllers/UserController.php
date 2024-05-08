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
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $email = $request->input('email');
    $password = $request->input('password');
    //dd($request->all());
    $credentials = ['email' => $email, 'password' => $password];
    if ($this->attempt($credentials)) {
        return redirect()->back()->withSuccess('Login successful');
    } else {
        return redirect()->back()->withErrors(['message' => 'Login failed']);
    }
}
    public function logout()
    {
        Auth::logout();
        return redirect()->back()->withSuccess('Logout successful');
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

    public function setAdmin(Request $request) {
        $id = $request->input('id');
        $password = $request->input('password');
        $adminPass = 'hesloadmin';
        if ($password == $adminPass) {
            $user = User::find($id);
            $user->role = 'admin';
            $user->save();
            return redirect()->back()->withSuccess('User is now admin');
        } else {
            return redirect()->back()->withErrors(['message' => 'Password is incorrect']);
        }    
    }

    public function getAdminPage() {
        $user = Auth::user();
        return view('baseWeb.admin', compact('user'));
    }

    public function editUser() {
        $user = Auth::user();
        return view('baseWeb.editUser', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'new_password_confirmation' => 'required|same:new_password'
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors(['message' => 'Old password is incorrect']);
        }
        if ($request->input('new_password') != $request->input('new_password_confirmation')) {
            return redirect()->back()->withErrors(['message' => 'New password and confirmation do not match']);
        }
    
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('new_password'));
        $user->email = $request->input('email');
        $user->save();
    
        return redirect()->back()->with('success', 'User updated');
    }
    
}
