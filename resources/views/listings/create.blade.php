<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-card class="shadow-lg p-4 rounded">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Create Job Listing</h2>
                        <form id="jobListingForm" action="/listings" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" class="form-control form-control-lg" id="company" name="company" value="{{ old('company') }}" placeholder="Enter company name">
                                @error('company')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="logo" class="form-label">Company Logo</label>
                                <input type="file" class="form-control form-control-lg" id="logo" name="logo">
                                @error('logo')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control form-control-lg" id="location" name="location" value="{{ old('location') }}" placeholder="Enter job location">
                                @error('location')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Enter contact email">
                                @error('email')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control form-control-lg" id="website" name="website" value="{{ old('website') }}" placeholder="Enter company website">
                                @error('website')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Job Title</label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{ old('title') }}" placeholder="Enter job title">
                                @error('title')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="tags" class="form-label">Tags (comma-separated)</label>
                                <input type="text" class="form-control form-control-lg" id="tags" name="tags" value="{{ old('tags') }}" placeholder="e.g. Marketing, Finance, IT">
                                @error('tags')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="form-label">Job Description</label>
                                <textarea class="form-control form-control-lg" id="description" name="description" rows="6" placeholder="Provide a detailed job description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" id="submitButton" class="btn btn-primary btn-lg">
                                    <span id="submitText">Create Listing</span>
                                    <span id="loadingSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </x-card>
            </div>
        </div>
    </div>

    <style>
        .form-control {
            border-radius: 0.5rem;
        }

        .form-control-lg {
            font-size: 1.1rem;
            padding: 0.75rem 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.75rem;
        }
    </style>

    <script>
        document.getElementById('jobListingForm').addEventListener('submit', function(e) {
            var submitButton = document.getElementById('submitButton');
            var submitText = document.getElementById('submitText');
            var loadingSpinner = document.getElementById('loadingSpinner');

            submitButton.disabled = true;
            submitText.textContent = 'Submitting...';
            loadingSpinner.classList.remove('d-none');
        });
    </script>
</x-layout>
