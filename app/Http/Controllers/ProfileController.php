<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showSetupForm() {
        return view('auth.profile_setup');
    }

    public function postSetup(Request $request) {
        // Validate the profile fields
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        // Get the data back from the session
        $registerData = Session::get('registration_data');

        if (!$registerData) {
            return redirect()->route('register')->with('error', 'Session expired. Please start again.');
        }

        // SAVE to Database
        $user = User::create([
            'email' => $registerData['email'],
            'password' => $registerData['password'],
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => 'user',
        ]);

        // 4. Log the user in and clear session
        Auth::login($user);
        Session::forget('registration_data');

        return redirect('/home');
    }
}