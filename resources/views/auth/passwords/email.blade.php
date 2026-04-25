<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - DroneFY</title>

    <!-- Font Awesome (keep CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Laravel asset -->
    <link rel="stylesheet" href="{{ asset('css/reset_password.css') }}">
</head>

<body>

    <div class="container">

        <!-- Left Illustration -->
        <div class="illustration">
            <div class="illustration-content">
                <i class="fas fa-lock"></i>
                <h2>Reset Your Password</h2>
                <p>Enter your email address to securely reset your password.</p>
            </div>
        </div>

        <!-- Right Form -->
        <div class="form-section">
            <div class="logo">
                <img src="{{ asset('photo/logo.png') }}" alt="Logo">
                <p>Secure Account Management</p>
            </div>

            <div class="form-header">
                <h2>Reset Password</h2>
                <p>Enter your email address to continue</p>
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

            <!-- Session Error -->
            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Email Address</label>

                    <div class="email-input-container">


                        <input type="email" class="phone-input" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email address" required>
                    </div>
                </div>

                <button type="submit" class="next-button">
                    Send Password Reset Link
                </button>
            </form>

            <a href="{{ route('login') }}" class="back-link">
                <i class="fas fa-arrow-left"></i>
                Back to Login
            </a>

            <div class="copyright">
                © {{ date('Y') }} DroneFY. All rights reserved.
            </div>
        </div>

    </div>



</body>

</html>