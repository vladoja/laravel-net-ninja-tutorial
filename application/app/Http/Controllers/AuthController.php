<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // password_confirmation field is automatically validated by 'confirmed' rule
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
            // Note: In a real application, ensure to hash the password before storing it
            // 'password' => bcrypt($validated['password']        ),
        ]);
        Auth::login($user);
        return redirect()->route('ninjas.index');
    }

    public function login(Request $request)
    {
        // Login logic here
    }
}
