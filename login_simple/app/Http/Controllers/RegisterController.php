<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showLoginForm()
    {
        return view(view: 'login');
    }

    public function login(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email field is required',
            'email.email' => 'Invalid email format',
            'password.required' => 'Password field is required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($validated)) {
            // Authentication successful, redirect to intended route
            return redirect()->intended('/register');
        } else {
            // Authentication failed, return error message
            return redirect()->back()->withErrors(['Invalid email or password']);
        }
    }

    public function showRegistrationForm()
    {
        return view('register');
    }




    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route(route: 'login')->with('success', 'Registration successful!');
    }
}