<x-layout>
    <div class="container mt-5">
        <x-card>
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-4"><i class="fas fa-tasks mr-2"></i>Manage Users</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($users->isEmpty())
                    <div class="alert alert-danger" role="alert">
                        No users found.
                    </div>
                @else
                    <table class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->is_admin ? 'success' : 'info' }}">
                                            {{ $user->is_admin ? 'Admin' : 'User' }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="/admin/users/{{ $user->id }}/edit"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <x-confirm-delete :action="'/admin/users/' . $user->id"
                                                message="Are you sure you want to delete this listing?" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="mt-6 p-4">
                        {{ $users->links('vendor.pagination.bootstrap-5') }}
                    </div>
                @endif
            </div>
        </x-card>
    </div>
</x-layout>
