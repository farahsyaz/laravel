<x-layout>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card shadow">
                  <div class="card-header bg-primary text-white">
                      <h1 class="mb-0">
                          <i class="fas fa-user-circle me-2 mr-2"></i>User Details
                      </h1>
                  </div>
                  <div class="card-body">
                      <div class="row mb-4">
                          <div class="col-md-6">
                              <h5 class="text-muted mb-3">Personal Information</h5>
                              <p><strong>Name:</strong> {{ $user->name }}</p>
                              <p><strong>Email:</strong> {{ $user->email }}</p>
                              <p><strong>Registered:</strong> {{ $user->created_at->format('F d, Y') }}</p>
                              <p>
                                  <strong>User Type:</strong>
                                  <span class="badge {{ $user->is_admin ? 'bg-success' : 'bg-info' }}">
                                      {{ $user->is_admin ? "Admin" : "User"}}
                                  </span>
                              </p>
                          </div>
                          <div class="col-md-6">
                              <h5 class="text-muted mb-3">Actions</h5>
                              <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mb-2 d-block">
                                  <i class="fas fa-edit me-2 mr-2"></i>Edit User
                              </a>
                              <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger d-block w-100" onclick="return confirm('Are you sure you want to delete this user?')">
                                      <i class="fas fa-trash-alt me-2 mr-2"></i>Delete User
                                  </button>
                              </form>
                          </div>
                      </div>
                      <div class="text-end mt-4">
                          <a href="{{ route('admin.users') }}" class="btn btn-secondary">
                              <i class="fas fa-arrow-left me-2 mr-2"></i>Back to Users List
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-layout>