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
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Check the role AFTER login to redirect
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/products');
            }
            return redirect()->intended('/home');
        }

        return back()->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Invalid credentials.']);
    }
}