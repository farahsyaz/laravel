<x-layout>
    <style>
        .register-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        
        .register-card {
            background: white;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            overflow: hidden;
        }
        
        .register-header {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            padding: 2rem;
            color: white;
            border-bottom: none;
        }
        
        .register-body {
            padding: 2.5rem;
        }
        
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
        }
        
        .input-group-text {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }
        
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .register-btn {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
        }
        
        .register-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        
        .login-link {
            color: #2563eb;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .login-link:hover {
            color: #1d4ed8;
        }
    </style>

    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="register-card">
                        <div class="register-header text-center">
                            <h2 class="mb-0">Create Account</h2>
                            <p class="mb-0 mt-2 text-white-50">Join our community today</p>
                        </div>
                        
                        <div class="register-body">
                            <form action="/users" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="name" class="form-label small fw-bold text-secondary">FULL NAME</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                            class="form-control border-0 bg-light" 
                                            id="name" 
                                            name="name" 
                                            value="{{ old('name') }}" 
                                            placeholder="Enter your full name"
                                            required
                                        >
                                    </div>
                                    @error('name')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label small fw-bold text-secondary">EMAIL ADDRESS</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input 
                                            type="email" 
                                            class="form-control border-0 bg-light" 
                                            id="email" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            placeholder="Enter your email"
                                            required
                                        >
                                    </div>
                                    @error('email')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label small fw-bold text-secondary">PASSWORD</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input 
                                            type="password" 
                                            class="form-control border-0 bg-light" 
                                            id="password" 
                                            name="password" 
                                            placeholder="Choose a password"
                                            required
                                        >
                                    </div>
                                    @error('password')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label small fw-bold text-secondary">CONFIRM PASSWORD</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input 
                                            type="password" 
                                            class="form-control border-0 bg-light" 
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            placeholder="Confirm your password"
                                            required
                                        >
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary register-btn mb-4">
                                    Create Account
                                </button>

                                <div class="text-center">
                                    <span class="text-muted">Already have an account?</span>
                                    <a href="/login" class="login-link ms-1 text-decoration-none">
                                        Sign in instead
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>