<x-layout>
    <style>
        .profile-container {
            min-height: 80vh;
            padding: 3rem 0;
            background-color: #f8fafc;
        }
        
        .profile-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            overflow: hidden;
        }
        
        .profile-header {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            padding: 1.5rem;
            border-bottom: none;
        }
        
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
        }
        
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .input-group-text {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .btn:hover {
            transform: translateY(-1px);
        }
        
        .danger-zone {
            background-color: #fff1f2;
            border-top: 1px solid #fecdd3;
            padding: 2rem;
        }
        
        .danger-zone-title {
            color: #be123c;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .delete-btn {
            background-color: #be123c;
            border-color: #be123c;
        }
        
        .delete-btn:hover {
            background-color: #9f1239;
            border-color: #9f1239;
        }
        
        .modal-content {
            border-radius: 1rem;
            border: none;
        }
        
        .modal-header {
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem;
        }
        
        .modal-footer {
            border-top: 1px solid #e5e7eb;
            padding: 1.5rem;
        }
    </style>

    <div class="profile-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-edit text-white fs-4 me-3"></i>
                                <h2 class="text-white mb-0">Edit Profile</h2>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="name" class="form-label small fw-bold text-secondary">FULL NAME</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control border-0 bg-light @error('name') is-invalid @enderror"
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name', $user->name) }}" 
                                               required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label small fw-bold text-secondary">EMAIL ADDRESS</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="email" 
                                               class="form-control border-0 bg-light @error('email') is-invalid @enderror"
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email', $user->email) }}" 
                                               required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label small fw-bold text-secondary">NEW PASSWORD</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control border-0 bg-light @error('password') is-invalid @enderror"
                                               id="password" 
                                               name="password">
                                    </div>
                                    <div class="form-text small text-muted mt-1">Leave blank to keep current password</div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label small fw-bold text-secondary">CONFIRM NEW PASSWORD</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control border-0 bg-light"
                                               id="password_confirmation"
                                               name="password_confirmation">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Back
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="danger-zone">
                            <h5 class="danger-zone-title">
                                <i class="fas fa-exclamation-triangle me-2"></i>Danger Zone
                            </h5>
                            <p class="text-gray-600 mb-4">
                                Once you delete your account, there is no going back. Please be certain.
                            </p>
                            <button type="button" 
                                    class="btn btn-danger delete-btn" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteAccountModal">
                                <i class="fas fa-trash me-2"></i>Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-danger fw-bold" id="deleteAccountModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Delete Account
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <p class="mb-0">Are you sure you want to delete your account? This action cannot be undone and will permanently delete all your data.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-account-form" action="{{ route('user.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <i class="fas fa-trash me-2"></i>Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>