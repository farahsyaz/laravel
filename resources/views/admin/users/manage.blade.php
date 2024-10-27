@extends('layouts.app')

@push('styles')
    <style>
        .dashboard-card {
            background: white;
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            border: none;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            border-radius: 1rem 1rem 0 0;
            padding: 1.5rem;
        }

        .search-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            padding: 0.5rem;
        }

        .search-input {
            background: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
        }

        .search-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
        }

        .search-btn {
            background: white;
            color: #6366f1;
            border: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .search-btn:hover {
            background: #e2e4ff;
            color: #4f46e5;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .user-badge {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.375rem;
        }

        .badge-admin {
            background: #10b981;
            color: white;
        }

        .badge-user {
            background: #60a5fa;
            color: white;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            transition: var(--transition);
            margin: 0 0.125rem;
        }

        .btn-create {
            background: #6366f1;
            color: white;
        }

        .btn-view {
            background: #6366f1;
            color: white;
            border: none;
            text-decoration: none
        }

        .btn-edit {
            background: #eab308;
            color: white;
            border: none;
            text-decoration: none
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
        }

        .btn-view:hover {
            background: #4f46e5;
        }

        .btn-edit:hover {
            background: #ca8a04;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .pagination {
            margin: 0;
            padding: 1rem 1rem;
        }

        .page-link {
            color: #6366f1;
            border: none;
            padding: 0.5rem 1rem;
            margin: 0 0.125rem;
            border-radius: 0.375rem;
        }

        .page-link:hover {
            background: #e2e4ff;
            color: #4f46e5;
        }

        .page-item.active .page-link {
            background: #6366f1;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #64748b;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #94a3b8;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="dashboard-card">
            <div class="dashboard-header">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h3 class="m-0">
                            <i class="fas fa-users me-2"></i>
                            Manage Users
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.users') }}" method="GET" class="search-container">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input"
                                    placeholder="Search users..." value="{{ request('search') }}">
                                <button type="submit" class="btn search-btn">
                                    <i class="fas fa-search me-2"></i>
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn btn-primary btn-create"><i class="fas fa-plus"></i>
                            Create</a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                @if ($users->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-user-slash"></i>
                        <h4>No Users Found</h4>
                        <p class="text-muted">Try adjusting your search criteria</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>JOINED</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-placeholder me-3">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </div>
                                                <div>
                                                    {{ $user->name }}
                                                    @if ($user->id == auth()->id())
                                                        <span class="ms-2 text-muted">(You)</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        <td class="align-middle">
                                            <span class="user-badge {{ $user->is_admin ? 'badge-admin' : 'badge-user' }}">
                                                {{ $user->is_admin ? 'Admin' : 'User' }}
                                            </span>
                                        </td>
                                        <td class="align-middle">{{ $user->created_at->format('M d, Y') }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('admin.users.show', $user) }}" class="action-btn btn-view"
                                                title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/admin/users/{{ $user->id }}/edit" class="action-btn btn-edit"
                                                title="Edit User">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="action-btn btn-delete" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $user->id }}" title="Delete User">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center border-top">
                        {{ $users->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
