<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->has('invalid'))
                            <div class="alert alert-danger">
                                {{ $errors->first('invalid') }}
                            </div>
                        @endif

                        <form action="/users/authenticate" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            Don't have an account?
                            <a href="/register" class="text-decoration-none">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
