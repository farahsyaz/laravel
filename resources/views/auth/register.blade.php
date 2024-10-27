@extends('layouts.app')

@push('styles')
    <style>
        .register-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }

        .register-header {
            text-align: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .register-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0;
        }

        .register-header p {
            margin: 0.5rem 0 0;
            opacity: 0.9;
        }

        .register-body {
            padding: 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-floating input {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 1rem 0.75rem;
        }

        .form-floating input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(73, 66, 228, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            z-index: 4;
        }

        .password-strength {
            height: 5px;
            border-radius: 2.5px;
            margin-top: 0.5rem;
            background: #e0e0e0;
            overflow: hidden;
        }

        .password-strength-meter {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
        }

        .weak {
            width: 33.33%;
            background: #dc3545;
        }

        .medium {
            width: 66.66%;
            background: #ffc107;
        }

        .strong {
            width: 100%;
            background: #28a745;
        }

        .password-requirements {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.25rem;
        }

        .requirement i {
            font-size: 0.75rem;
        }

        .requirement.met {
            color: var(--success-color);
        }

        .btn-register {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(73, 66, 228, 0.3);
        }

        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e0e0e0;
        }

        .register-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        @media (max-width: 576px) {
            .register-container {
                padding: 1rem;
            }

            .register-body {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="register-container">
            <div class="register-card">
                <div class="register-header">
                    <h1>Create Account</h1>
                    <p>Join our community today</p>
                </div>
                <div class="register-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Full Name" value="{{ old('name') }}" required
                                autocomplete="name" autofocus>
                            <label for="name">Full Name</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="name@example.com" value="{{ old('email') }}" required
                                autocomplete="email">
                            <label for="email">Email Address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" required autocomplete="new-password">
                            <label for="password">Password</label>
                            <span class="password-toggle" onclick="togglePassword('password')">
                                <i class="far fa-eye"></i>
                            </span>
                            <div class="password-strength">
                                <div class="password-strength-meter"></div>
                            </div>
                            <div class="password-requirements">
                                <div class="requirement" id="length">
                                    <i class="fas fa-circle"></i> At least 8 characters
                                </div>
                                <div class="requirement" id="uppercase">
                                    <i class="fas fa-circle"></i> One uppercase letter
                                </div>
                                <div class="requirement" id="number">
                                    <i class="fas fa-circle"></i> One number
                                </div>
                                <div class="requirement" id="special">
                                    <i class="fas fa-circle"></i> One special character
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                                placeholder="Confirm Password" required autocomplete="new-password">
                            <label for="password-confirm">Confirm Password</label>
                            <span class="password-toggle" onclick="togglePassword('password-confirm')">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary btn-register">
                            Create Account
                        </button>

                        <div class="register-footer">
                            Already have an account? <a href="{{ route('login') }}">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const meter = document.querySelector('.password-strength-meter');

            // Check requirements
            const hasLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[!@#$%^&*]/.test(password);

            // Update requirement indicators
            updateRequirement('length', hasLength);
            updateRequirement('uppercase', hasUppercase);
            updateRequirement('number', hasNumber);
            updateRequirement('special', hasSpecial);

            // Calculate strength
            let strength = 0;
            if (hasLength) strength++;
            if (hasUppercase) strength++;
            if (hasNumber) strength++;
            if (hasSpecial) strength++;

            // Update meter
            meter.className = 'password-strength-meter';
            if (strength >= 4) meter.classList.add('strong');
            else if (strength >= 2) meter.classList.add('medium');
            else if (strength >= 1) meter.classList.add('weak');
        });

        function updateRequirement(id, met) {
            const requirement = document.getElementById(id);
            if (met) {
                requirement.classList.add('met');
                requirement.querySelector('i').className = 'fas fa-check-circle';
            } else {
                requirement.classList.remove('met');
                requirement.querySelector('i').className = 'fas fa-circle';
            }
        }
    </script>
@endpush
