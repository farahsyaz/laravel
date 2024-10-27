@extends('layouts.app')

@push('styles')
    <style>
        .login-container {
            max-width: 450px;
            margin: 0 auto;
            padding: 2rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .login-header {
            text-align: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px 20px 0 0;
            color: white;
        }

        .login-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0;
        }

        .login-body {
            padding: 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-floating input {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 1rem 0.75rem;
        }

        .form-floating input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(73, 66, 228, 0.1);
        }

        .form-floating label {
            padding: 1rem 0.75rem;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(73, 66, 228, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e0e0e0;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 1rem;
            }

            .login-body {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="login-container">
        <div class="card login-card">
            <div class="login-header">
                <h1>Welcome Back</h1>
            </div>
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="name@example.com" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Password" required autocomplete="current-password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-login">
                            Sign In
                        </button>
                    </div>

                    <div class="login-footer">
                        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
