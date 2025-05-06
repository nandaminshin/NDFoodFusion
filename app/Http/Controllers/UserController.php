<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Check if user already exists with this email
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'An account with this email already exists. Please sign in instead.']);
        }

        // Check if passwords match
        if ($request->password !== $request->password_confirmation) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'The password confirmation does not match.']);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|max:1024'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        // Log the user in after registration
        Auth::login($user);

        return redirect()->route('home')
            ->with('status', 'Welcome to FoodFusion!');
    }

    // Add this method to existing UserController
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('status', 'Welcome back!');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Invalid credentials. Please try again.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
