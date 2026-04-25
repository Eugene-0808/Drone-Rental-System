<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DroneFY - Login</title>

    <!-- Laravel asset -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="225">
        </div>
        <div class="auth-links">
            <a href="{{ route('register') }}" class="auth-link">Sign up</a>
            <a href="{{ route('login') }}" class="auth-link active">Log in</a>
        </div>
    </div>

    <!-- Main -->
    <div class="main-content">
        <div class="content-wrapper">

            <!-- Left Section -->
            <div class="welcome-section">
                <h1 class="welcome-title">Welcome Back</h1>
                <p class="welcome-text">
                    Sign in to continue your journey and access your account.
                </p>

                <ul class="features">
                    <li><span class="feature-icon">✓</span> Access your dashboard</li>
                    <li><span class="feature-icon">✓</span> Manage account settings</li>
                    <li><span class="feature-icon">✓</span> Continue where you left off</li>
                </ul>
            </div>

            <!-- Login Form -->
            <div class="login-form-container">
                <div class="form-header">
                    <h2 class="form-title">Login</h2>
                    <p class="form-subtitle">Enter your credentials</p>
                </div>

                <!-- Laravel Errors -->
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Optional custom error -->
                @if(session('error'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif

                <form class="login-form" method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-input" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email" required>
                    </div>

                    <div class="form-group password-input">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-input" name="password" placeholder="Enter your password"
                            required>
                    </div>

                    <div class="form-options">
                        <a href="#" class="forgot-password">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="submit" class="login-button">Login</button>

                    <div class="signup-link">
                        <span>Don't have an account? </span>
                        <a href="{{ route('register') }}">Sign up now</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="copyright">© {{ date('Y') }} DroneFY. All rights reserved.</div>
    </div>

    <!-- Simple validation (optional) -->
    <script>
        document.querySelector('.login-form').addEventListener('submit', function (e) {
            const email = this.email.value.trim();
            const password = this.password.value;

            if (!email || !password) {
                alert('All fields are required');
                e.preventDefault();
            }

            if (password.length < 6) {
                alert('Password must be at least 6 characters');
                e.preventDefault();
            }
        });
    </script>

</body>

</html>