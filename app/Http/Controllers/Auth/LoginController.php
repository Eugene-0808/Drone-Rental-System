<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {

        return view('auth.login');
    }
    // Single login method for User and Admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.']);
        }

        // Allow plain text password comparison (for old database)
        // Also try Hash::check() in case some passwords are encrypted
        if ($user->password === $request->password || \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            // Log the user in (session)
            \Illuminate\Support\Facades\Auth::login($user, $request->has('remember'));

            session()->flash('success', 'Welcome back, ' . $user->full_name . '!');

            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}