<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ContactController extends Controller
{

    public function showForm(Request $request)
    {
        $name = $request->cookie('contact_name', '');
        $email = $request->cookie('contact_email', '');

        return view('contact.form', compact('name', 'email'));
    }

    public function submit(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    // Insert using DB facade (bypass model issues)
    \Illuminate\Support\Facades\DB::table('contact_messages')->insert([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'subject' => $validated['subject'] ?? null,
        'message' => $validated['message'],
        'created_at' => now(),
    ]);

    // Store cookies
    Cookie::queue('contact_name', $validated['name'], 43200);
    Cookie::queue('contact_email', $validated['email'], 43200);

    return redirect()->route('contact.form')->with('success', 'Your message has been sent successfully!');
}
}