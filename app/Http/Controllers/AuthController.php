<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login
    public function login()
    {
        if (Auth::check()) {
            // If authenticated, redirect to the dashboard or any other page
            return redirect('/dashboard');
        }
        return view('auth.login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required', // Ini bisa berupa field 'email' atau 'username'
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $fieldType => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    // Register
    public function register()
    {
        if (Auth::check()) {
            // If authenticated, redirect to the dashboard or any other page
            return redirect('/dashboard');
        }
        return view('auth.register',[
            'title' => 'Register'
        ]);
    }

     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255|confirmed'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success', 'Registrtion successfull! Please login');
        return redirect('/login')->with('success', 'Registrtion successfull! Please login');
    }

    // Reset Password
    public function password()
    {
        if (Auth::check()) {
            // If authenticated, redirect to the dashboard or any other page
            return redirect('/dashboard');
        }
        return view('auth.password',[
            'title' => 'Reset Password'
        ]);
    }

    // Logout
        public function logout()
    {
        Auth::logout();
        request()
            ->session()
            ->invalidate();
        request()
            ->session()
            ->regenerateToken();
        return redirect('/login');
    }
}
