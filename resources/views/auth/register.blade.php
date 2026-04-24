<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DroneFY - Sign Up</title>

    <!-- Laravel asset helper -->
    <link rel="stylesheet" href="{{ asset('css/sign_up.css') }}">
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="225">
        </div>
        <div class="auth-links">
            <a href="{{ route('register') }}" class="auth-link active">Sign up</a>
            <a href="{{ route('login') }}" class="auth-link">Log in</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper">

            <!-- Welcome Section -->
            <div class="welcome-section">
                <h1 class="welcome-title">Join Our Community</h1>
                <p class="welcome-text">Create your account and start your journey with us.</p>
                <p class="welcome-text">Get access to exclusive features and services</p>

                <ul class="features">
                    <li><span class="feature-icon">✓</span> Secure account protection</li>
                    <li><span class="feature-icon">✓</span> Instant access to services</li>
                    <li><span class="feature-icon">✓</span> 24/7 customer support</li>
                </ul>
            </div>

            <!-- Sign Up Form -->
            <div class="signup-form-container">
                <div class="form-header">
                    <h2 class="form-title">Create Account</h2>
                    <p class="form-subtitle">Sign up to get started</p>
                </div>

                <!-- Laravel Validation Errors -->
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success Message -->
                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="signup-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Email:</label>
                        <input 
                            type="email" 
                            class="form-input" 
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="Enter your email" 
                            required>
                    </div>

                    <div class="form-group password-input">
                        <label class="form-label">Password:</label>
                        <input 
                            type="password" 
                            class="form-input" 
                            name="password" 
                            placeholder="Enter password" 
                            required>
                    </div>

                    <div class="form-group password-input">
                        <label class="form-label">Confirm Password:</label>
                        <input 
                            type="password" 
                            class="form-input" 
                            name="password_confirmation" 
                            placeholder="Confirm password" 
                            required>
                    </div>

                    <button type="submit" class="signup-button">Sign up</button>

                    <div class="terms">
                        By signing up, you agree to the 
                        <a href="{{ route('tos') }}">DroneRental Terms Of Service</a> 
                        and 
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                    </div>

                    <div class="footer-links">
                        <div class="copyright">© {{ date('Y') }} DroneFY. All rights reserved.</div>
                        <a href="{{ route('login') }}" class="login-link">Have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="copyright">© {{ date('Y') }} DroneFY. All rights reserved.</div>
    </div>

</body>
</html>