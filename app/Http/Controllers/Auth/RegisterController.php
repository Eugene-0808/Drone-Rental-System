<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create user without any unknown columns
    $user = User::create([
    'name' => 'User',
    'email' => $validated['email'],
    'password' => Hash::make($validated['password']),
    'role' => 'customer',
    'phone_number' => '',   // add this
    'address' => '',        // add this if the table requires it
]);

    Auth::login($user);

    session()->flash('success', 'Registration successful! Welcome to Drone Rental.');

    return redirect()->route('home');
}
}