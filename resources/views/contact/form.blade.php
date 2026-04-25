@extends('layouts.app')

@section('content')
<div class="contact-hero">
    <div class="contact-card">
        <h1>Contact Us</h1>

        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('contact.submit') }}">
            @csrf

            <div class="form-row">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $name ?? '') }}">
            </div>

            <div class="form-row">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required value="{{ old('email', $email ?? '') }}">
            </div>

            <div class="form-row">
                <label for="phone">Phone *</label>
                <input type="text" id="phone" name="phone" required value="{{ old('phone') }}">
            </div>

            <div class="form-row">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
            </div>

            <div class="form-row">
                <label>Date</label>
                <input type="text" value="{{ date('Y-m-d') }}" disabled>
            </div>

            <div class="form-row">
                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="6" maxlength="2000" required>{{ old('message') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn primary">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection