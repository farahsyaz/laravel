@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <span class="alert-icon">
                <i class="fas fa-exclamation-circle fs-5 me-2"></i>
            </span>
            <div>
                <h6 class="alert-heading mb-1">Oops! Something went wrong</h6>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <span class="alert-icon">
                <i class="fas fa-check-circle fs-5 me-2"></i>
            </span>
            <div>
                <h6 class="alert-heading mb-1">Success!</h6>
                <p class="mb-0">{{ session('success') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <span class="alert-icon">
                <i class="fas fa-times-circle fs-5 me-2"></i>
            </span>
            <div>
                <h6 class="alert-heading mb-1">Error!</h6>
                <p class="mb-0">{{ session('error') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <span class="alert-icon">
                <i class="fas fa-exclamation-triangle fs-5 me-2"></i>
            </span>
            <div>
                <h6 class="alert-heading mb-1">Warning!</h6>
                <p class="mb-0">{{ session('warning') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <span class="alert-icon">
                <i class="fas fa-info-circle fs-5 me-2"></i>
            </span>
            <div>
                <h6 class="alert-heading mb-1">Info</h6>
                <p class="mb-0">{{ session('info') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- // Success message
return redirect()->route('home')->with('success', 'Your action was successful!');

// Error message
return redirect()->back()->with('error', 'Something went wrong!');

// Warning message
return redirect()->back()->with('warning', 'Please review your input.');

// Info message
return redirect()->route('home')->with('info', 'Here is some useful information.'); --}}
