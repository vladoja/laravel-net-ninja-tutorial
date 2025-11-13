<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        Log::info('Login attempt for email: ' . $request->input('email'));
        $credentials = $request->only('email', 'password');
        $successfulAuth = Auth::attempt($credentials);
        if ($successfulAuth) {
            // regenerate session to prevent session fixation
            $request->session()->regenerate();
            return redirect()->intended(route('ninjas.index'));
        } else {
            Log::error('Failed login attempt for email: ' . $request->input('email'));
            throw ValidationException::withMessages([
                'credentials' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Log::info('Logout initiated for user ID: ' . Auth::id());

        Auth::logout();

        // invalidate the session
        $request->session()->invalidate();
        // regenerate CSRF token
        $request->session()->regenerateToken();

        Log::info('Logout completed successfully.');

        return redirect()->route('show.login');
    }
}
