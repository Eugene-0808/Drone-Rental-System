<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DroneFY - Terms of Service</title>

    <!-- Laravel asset -->
    <link rel="stylesheet" href="{{ asset('css/tos.css') }}">
</head>
<body>

    <div class="container">
        <h1>Terms of Service</h1>

        <p>
            Welcome to DroneFY. By using our services, you agree to the following terms and conditions:
        </p>

        <h2>1. Account Responsibilities</h2>
        <p>
            You must provide accurate information when creating an account. You are responsible for keeping your login details secure.
        </p>

        <h2>2. Rental Usage</h2>
        <p>
            Drones must only be used for legal purposes. You agree not to operate drones in restricted areas or for unsafe activities.
        </p>

        <h2>3. Payment</h2>
        <p>
            All rentals must be paid in advance. Refunds are only available if the drone is returned in proper condition.
        </p>

        <h2>4. Liability</h2>
        <p>
            DroneFY is not responsible for damages, injuries, or legal issues caused by misuse of rented drones.
        </p>

        <h2>5. Termination</h2>
        <p>
            We reserve the right to suspend or terminate accounts that violate these terms.
        </p>

        <a href="{{ route('register') }}" class="back-link">
            ← Back to Sign Up
        </a>
    </div>

</body>
</html>