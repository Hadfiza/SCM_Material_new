<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: #123640;
        }
    </style>
</head>
<body class="bg-body-tertiary d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card shadow-lg p-4 mx-auto" style="max-width: 30rem;">
            <div class="card-body">
                <h1 class="text-center text-white fw-bold mb-4">Log In</h1>
                
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <x-input-label for="email" class="form-label text-white" :value="__('Email')" />
                        <x-text-input id="email" class="form-control form-control-lg bg-light fs-6" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address" />
                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                    </div>
                    
                    <!-- Password -->
                    <div class="form-group mb-3">
                        <x-input-label for="password" class="form-label text-white" :value="__('Password')" />
                        <x-text-input id="password" class="form-control form-control-lg bg-light fs-6" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label text-white">{{ __('Remember me') }}</label>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-lg btn-primary w-100 fs-6" value="Log In">
                    </div>
                    
                    <!-- Forgot Password and Sign Up -->
                    <div class="text-center text-white mb-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-white">Forgot your password?</a>
                        @endif
                        <br>
                        <small>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none text-link-blue">Sign Up</a></small>
                    </div>
                    
                    <!-- Back Button -->
                    <div class="text-center">
                        <a href="{{ url('/welcome') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
