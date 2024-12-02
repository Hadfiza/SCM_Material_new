<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: #123640;
        }
        .text-link-blue {
            color: #0d6efd; /* Bootstrap primary color */
        }
        .text-link-blue:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-body-tertiary d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card shadow-lg p-4 mx-auto" style="max-width: 30rem;">
            <div class="card-body">
                <h1 class="text-center text-white fw-bold mb-4">Sign Up</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <!-- Name -->
                    <div class="form-group mb-3">
                        <x-input-label for="name" class="form-label text-white" :value="__('Name')" />
                        <x-text-input id="name" class="form-control form-control-lg bg-light fs-6" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name" />
                        <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group mb-3">
                        <x-input-label for="email" class="form-label text-white" :value="__('Email')" />
                        <x-text-input id="email" class="form-control form-control-lg bg-light fs-6" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address" />
                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                    </div>
                    
                    <!-- Password -->
                    <div class="form-group mb-3">
                        <x-input-label for="password" class="form-label text-white" :value="__('Password')" />
                        <x-text-input id="password" class="form-control form-control-lg bg-light fs-6" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="form-group mb-4">
                        <x-input-label for="password_confirmation" class="form-label text-white" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control form-control-lg bg-light fs-6" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary w-100 fs-6" value="Sign Up">
                    </div>
                    
                    <!-- Login Redirect -->
                    <div class="text-center text-white mb-3">
                        <small>Already have an account? <a href="{{ route('login') }}" class="text-link-blue text-decoration-none">Sign in</a></small>
                    </div>
                    
                    <!-- Back Button -->
                    <div class="form-group text-center">
                        <a href="{{ url('/welcome') }}" class="btn btn-secondary fs-6 px-4">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
