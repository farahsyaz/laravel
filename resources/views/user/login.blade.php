<x-layout>
    <style>
        .login-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        
        .login-card {
            background: white;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            padding: 2rem;
            color: white;
            border-bottom: none;
        }
        
        .login-body {
            padding: 2.5rem;
        }
        
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }
        
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .login-btn {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
        }
        
        .login-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        
        .alert {
            border: none;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        
        .register-link {
            color: #2563eb;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .register-link:hover {
            color: #1d4ed8;
        }
    </style>

    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if(session('error'))
                        <div class="alert alert-danger mb-4">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="login-card">
                        <div class="login-header text-center">
                            <h2 class="mb-0">Welcome Back</h2>
                            <p class="mb-0 mt-2 text-white-50">Please sign in to continue</p>
                        </div>
                        
                        <div class="login-body">
                            @if($errors->has('invalid'))
                                <div class="alert alert-danger mb-4">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    {{ $errors->first('invalid') }}
                                </div>
                            @endif

                            <form action="/users/authenticate" method="POST">
                                @csrf

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
                                            placeholder="Enter your password"
                                            required
                                        >
                                    </div>
                                    @error('password')
                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary login-btn mb-4">
                                    Sign In
                                </button>

                                <div class="text-center">
                                    <span class="text-muted">Don't have an account?</span>
                                    <a href="/register" class="register-link ms-1 text-decoration-none">
                                        Create one now
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