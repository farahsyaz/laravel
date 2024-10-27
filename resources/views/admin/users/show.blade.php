@extends('layouts.app')

@push('styles')

<style>
    .profile-card {
        border: none;
        border-radius: 1rem;
        box-shadow: var(--card-shadow);
        overflow: hidden;
    }

    .profile-header {
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
        padding: 2rem;
        color: white;
        position: relative;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0 auto 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .profile-title {
        font-size: 1.75rem;
        font-weight: 600;
        text-align: center;
        margin: 0;
    }

    .profile-email {
        text-align: center;
        opacity: 0.9;
        margin-top: 0.5rem;
    }

    .info-section {
        padding: 2rem;
    }

    .info-card {
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        height: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: var(--transition);
    }

    .info-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .info-title {
        color: var(--text-muted);
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.75rem;
        background: #f8fafc;
        border-radius: 0.5rem;
    }

    .info-label {
        font-weight: 500;
        color: var(--text-muted);
        width: 120px;
    }

    .info-value {
        flex-grow: 1;
        font-weight: 500;
    }

    .badge-role {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-admin {
        background-color: var(--success-color);
        color: white;
    }

    .badge-user {
        background-color: var(--info-color);
        color: white;
    }

    .action-btn {
        width: 100%;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .btn-edit {
        background-color: var(--primary-color);
        border: none;
        color: white;
        text-decoration: none
    }

    .btn-edit:hover {
        background-color: #4338ca;
        transform: translateY(-1px);
    }

    .btn-delete {
        background-color: #fee2e2;
        border: none;
        color: var(--danger-color);
    }

    .btn-delete:hover {
        background-color: #fecaca;
        transform: translateY(-1px);
    }

    .btn-back:hover {
        background-color: #e2e8f0;
        color: #475569;
    }

    .modal-confirm {
        color: #636363;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 1rem;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm .modal-body {
        padding: 20px 30px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }
</style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <h1 class="profile-title">{{ $user->name }}</h1>
                        <p class="profile-email">{{ $user->email }}</p>
                    </div>

                    <div class="info-section">
                        <div class="row g-4">
                            <div class="col-md-7">
                                <div class="info-card">
                                    <h5 class="info-title">Account Information</h5>

                                    <div class="info-item">
                                        <span class="info-label">Status</span>
                                        <span class="info-value">
                                            <span class="badge-role {{ $user->is_admin ? 'badge-admin' : 'badge-user' }}">
                                                {{ $user->is_admin ? 'Administrator' : 'Regular User' }}
                                            </span>
                                        </span>
                                    </div>

                                    <div class="info-item">
                                        <span class="info-label">Member Since</span>
                                        <span class="info-value">{{ $user->created_at->format('F d, Y') }}</span>
                                    </div>

                                    <div class="info-item">
                                        <span class="info-label">Last Updated</span>
                                        <span class="info-value">{{ $user->updated_at->format('F d, Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="info-card">
                                    <h5 class="info-title">Actions</h5>

                                    <a href="{{ route('admin.users.edit', $user) }}" class="action-btn btn-edit">
                                        <i class="fas fa-edit"></i>
                                        Edit Profile
                                    </a>

                                    <button type="button" class="action-btn btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmModal">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">
                        <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                        Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-4">
                        {{ $user->id == auth()->id()
                            ? 'Are you sure you want to delete your own account? This action cannot be undone.'
                            : 'Are you sure you want to delete this user? This action cannot be undone.' }}
                    </p>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
