<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\ProfileDetail;

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
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
        'gender' => 'nullable|string|max:50',
        'race' => 'nullable|string|max:50',
        'religion' => 'nullable|string|max:50',
        'dob' => 'nullable|date',
    ]);

    // Update users table
    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'] ?? '',
        'address' => $validated['address'] ?? '',
    ]);

    // Update or create profile_details
    ProfileDetail::updateOrCreate(
        ['user_id' => $user->id],
        [
            'gender' => $validated['gender'] ?? null,
            'race' => $validated['race'] ?? null,
            'religion' => $validated['religion'] ?? null,
            'dob' => $validated['dob'] ?? null,
        ]
    );

    session()->flash('success', 'Profile updated successfully.');

    return redirect()->route('profile.show', $user);
}
}