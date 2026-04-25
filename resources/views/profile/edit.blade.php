@extends('layouts.app')

@section('content')
<div class="profile-hero">
    <div class="profile-card">
        <h1>My Profile</h1>

        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="grid">
                <!-- Basic Info -->
                <div class="col">
                    <h3>Basic Info</h3>

                    <div class="form-row">
                        <label for="full_name">Full Name *</label>
                        <input type="text" id="full_name" name="full_name"
                               value="{{ old('full_name', $user->full_name) }}" required>
                        @error('full_name') <small class="err">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-row">
                        <label for="email">Email (read-only)</label>
                        <input type="email" id="email" value="{{ $user->email }}" readonly>
                    </div>

                    <div class="form-row">
                        <label for="phone">Phone *</label>
                        <input type="text" id="phone" name="phone"
                               value="{{ old('phone', $user->phone) }}" required>
                        @error('phone') <small class="err">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-row">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address"
                               value="{{ old('address', $user->address) }}">
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="col">
                    <h3>Additional Details</h3>

                    <div class="form-row">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="">— Select —</option>
                            <option value="Male"   {{ old('gender', $profileDetail->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $profileDetail->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other"  {{ old('gender', $profileDetail->gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="race">Race</label>
                        <input type="text" id="race" name="race"
                               value="{{ old('race', $profileDetail->race ?? '') }}">
                    </div>

                    <div class="form-row">
                        <label for="religion">Religion</label>
                        <input type="text" id="religion" name="religion"
                               value="{{ old('religion', $profileDetail->religion ?? '') }}">
                    </div>

                    <div class="form-row">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob"
                               value="{{ old('dob', $profileDetail->dob ?? '') }}">
                        @error('dob') <small class="err">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn primary">Save Changes</button>
                <a href="{{ route('profile.show', $user) }}" class="btn ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection