<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\RateLimiter;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'An account with this email already exists. Please sign in instead.']);
        }

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

        Auth::login($user);

        return redirect()->route('home')
            ->with('status', 'Welcome to FoodFusion!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (RateLimiter::tooManyAttempts($request->email, 8)) {
            $seconds = RateLimiter::availableIn($request->email);
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Too many login attempts. Please try again in ' . ceil($seconds / 60) . ' minutes.',
                ]);
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            RateLimiter::clear($request->email);
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('status', 'Welcome back!');
        }

        RateLimiter::hit($request->email, 180); // 180 seconds (3 minutes) decay time

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

    public function showProfileSettings()
    {
        return view('profile.profileSetting');
    }

    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|max:20000'
        ]);

        if ($request->hasFile('profile_photo')) {
            // Delete old profile photo if exists
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }
            $validated['profile_photo'] = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user->update($validated);

        return redirect()->route('profile.settings')
            ->with('success', 'Profile updated successfully!');
    }

    public function destroyProfile(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ]);
        }

        Auth::logout();
        $user->delete();

        return redirect()->route('home')
            ->with('success', 'Your account has been deleted successfully.');
    }
}