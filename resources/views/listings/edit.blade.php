@extends('layouts.app')

@push('styles')
    <style>
        /* Custom Styles */
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --section-bg: #F8FAFC;
        }

        body {
            background-color: #F1F5F9;
            color: #1E293B;
        }

        /* Card Styles */
        .main-card {
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .gradient-header {
            background: linear-gradient(135deg, var(--primary), #818CF8);
            padding: 3.5rem 2rem;
        }

        /* Form Sections */
        .content-section {
            background-color: var(--section-bg);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #E2E8F0;
        }

        .section-icon {
            color: var(--primary);
            background-color: rgba(79, 70, 229, 0.1);
            padding: 0.75rem;
            border-radius: 0.75rem;
            display: inline-flex;
        }

        /* Form Controls */
        .form-control,
        .form-select {
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid #E2E8F0;
            font-size: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        /* Logo Upload */
        .logo-upload .form-control {
            padding: 0.875rem 1rem;
        }

        /* Submit Button */
        .btn-submit {
            background-color: var(--primary);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 0.75rem;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content-section {
                padding: 1.5rem;
            }

            .gradient-header {
                padding: 2.5rem 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="min-vh-100 bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-9 col-lg-10">
                    <!-- Main Card -->
                    <div class="card main-card border-0">
                        <!-- Gradient Header -->
                        <div class="gradient-header text-white text-center p-5">
                            <h1 class="display-6 fw-semibold mb-2">Update Job Listing</h1>
                        </div>

                        <!-- Form Section -->
                        <div class="card-body p-4 p-lg-5">
                            <form id="editJobListingForm" action="/listings/{{ $listing->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Company Section -->
                                <div class="content-section">
                                    <div class="section-header d-flex align-items-center mb-4">
                                        <span class="section-icon me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            </svg>
                                        </span>
                                        <h2 class="h5 mb-0 text-primary">Company Details</h2>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label class="form-label">Company Name</label>
                                                <input type="text"
                                                    class="form-control @error('company') is-invalid @enderror"
                                                    name="company" placeholder="Enter your company name"
                                                    value="{{ $listing->company }}">

                                                @error('company')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-5">

                                            <div class="form-group">
                                                <label class="form-label">Company Logo</label>
                                                <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/hiring.jfif') }}"
                                                    class="img-fluid img-thumbnail" alt="Company Logo"
                                                    style="max-width: 200px; max-height: 200px;">
                                                <div class="logo-upload">
                                                    <input type="file"
                                                        class="form-control @error('logo') is-invalid @enderror"
                                                        name="logo" accept="image/*">
                                                    @error('logo')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Section -->
                                <div class="content-section">
                                    <div class="section-header d-flex align-items-center mb-4">
                                        <span class="section-icon me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                </path>
                                            </svg>
                                        </span>
                                        <h2 class="h5 mb-0 text-primary">Contact Information</h2>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ $listing->email }}" placeholder="contact@company.com">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Company Website</label>
                                                <input type="url"
                                                    class="form-control @error('website') is-invalid @enderror"
                                                    name="website" value="{{ $listing->website }}"
                                                    placeholder="https://company.com">
                                                @error('website')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Location</label>
                                                <input type="text"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    name="location" value="{{ $listing->location }}"
                                                    placeholder="City, Country or Remote">
                                                @error('location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Details Section -->
                                <div class="content-section">
                                    <div class="section-header d-flex align-items-center mb-4">
                                        <span class="section-icon me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect x="2" y="7" width="20" height="14" rx="2"
                                                    ry="2"></rect>
                                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                            </svg>
                                        </span>
                                        <h2 class="h5 mb-0 text-primary">Job Details</h2>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Job Title</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    name="title" value="{{ $listing->title }}"
                                                    placeholder="e.g. Senior Software Engineer">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Skills & Tags</label>
                                                <input type="text"
                                                    class="form-control @error('tags') is-invalid @enderror"
                                                    name="tags" value="{{ $listing->tags }}"
                                                    placeholder="e.g. React, Node.js, Remote">
                                                <div class="form-text">Separate tags with commas</div>
                                                @error('tags')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Job Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="6"
                                                    placeholder="Describe the role, responsibilities, requirements, and benefits...">{{ $listing->description }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="submit-section text-center">
                                    <button type="submit" class="btn btn-submit" id="submitButton">
                                        <span id="submitText">Update Job Listing</span>
                                        <span id="loadingSpinner" class="spinner-border spinner-border-sm ms-2 d-none"
                                            role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Form submission handling
        document.getElementById('editJobListingForm').addEventListener('submit', function(e) {
            var updateButton = document.getElementById('updateButton');
            var updateText = document.getElementById('updateText');
            var updateSpinner = document.getElementById('updateSpinner');

            updateButton.disabled = true;
            updateText.textContent = 'Updating...';
            updateSpinner.classList.remove('d-none');
        });

        // File input preview
        document.getElementById('logo').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const label = this.nextElementSibling;
                if (label) {
                    label.textContent = fileName;
                }
            }
        });
    </script>
@endpush
