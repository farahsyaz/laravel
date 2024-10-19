<x-layout>
  <div class="container">
      <h3 class="mb-4"><i class="fas fa-user-edit mr-2"></i>Update Profile</h3>
      
      <form action="{{ route('admin.users.update', $user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label for="password">Password (leave blank to keep current password)</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
          </div>
          <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
              <label class="form-check-label" for="is_admin">Is Admin</label>
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
      </form>
  </div>
</x-layout>