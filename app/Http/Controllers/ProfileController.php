<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        // Authorization: only the owner or an admin can view profile
        if (Gate::denies('view-profile', $user)) {
            abort(403, 'Unauthorized');
        }

        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        if (Gate::denies('update-profile', $user)) {
            abort(403, 'Unauthorized');
        }

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (Gate::denies('update-profile', $user)) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $user->update($validated);

        session()->flash('success', 'Profile updated successfully.');

        return redirect()->route('profile.show', $user);
    }
}