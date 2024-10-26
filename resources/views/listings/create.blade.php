@extends('layouts.app')

@push('styles')
    <style>
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

        /* File name display */
        .file-name {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #6b7280;
            word-break: break-all;
        }

        /* Disabled button state */
        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        /* Spinner styling */
        .spinner-border {
            width: 1rem;
            height: 1rem;
            border-width: 0.15em;
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
                            <h1 class="display-6 fw-semibold mb-2">Create Job Listing</h1>
                            <p class="text-white-50 mb-0">Share your opportunity with thousands of talented professionals
                            </p>
                        </div>

                        <!-- Form Section -->
                        <div class="card-body p-4 p-lg-5">
                            <form id="jobListingForm" action="/listings" method="POST" enctype="multipart/form-data">
                                @csrf

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
                                                    name="company" value="{{ old('company') }}"
                                                    placeholder="Enter your company name">
                                                @error('company')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Company Logo</label>
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
                                                    value="{{ old('email') }}" placeholder="contact@company.com">
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
                                                    name="website" value="{{ old('website') }}"
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
                                                    name="location" value="{{ old('location') }}"
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
                                                    name="title" value="{{ old('title') }}"
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
                                                    name="tags" value="{{ old('tags') }}"
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
                                                    placeholder="Describe the role, responsibilities, requirements, and benefits...">{{ old('description') }}</textarea>
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
                                        <span id="submitText">Post Job Listing</span>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Form handling
            const jobForm = document.getElementById('jobListingForm');

            if (jobForm) {
                // Get elements after confirming form exists
                const submitButton = document.getElementById('submitButton');
                const submitText = document.getElementById('submitText');
                const loadingSpinner = document.getElementById('loadingSpinner');

                jobForm.addEventListener('submit', function(event) {
                    // Check if all required elements exist
                    if (submitButton && submitText && loadingSpinner) {
                        try {
                            // Disable the button
                            submitButton.disabled = true;
                            submitButton.style.opacity = '0.7';
                            submitButton.style.cursor = 'not-allowed';

                            // Update text and show spinner
                            submitText.textContent = 'Posting Job...';
                            loadingSpinner.classList.remove('d-none');
                        } catch (error) {
                            console.error('Error in form submission:', error);
                        }
                    }
                });
            }

            // File input handling
            const logoInput = document.querySelector('input[name="logo"]');
            if (logoInput) {
                logoInput.addEventListener('change', function(event) {
                    try {
                        const file = event.target.files[0];
                        if (file) {
                            // Find the parent logo-upload div
                            const uploadDiv = this.closest('.logo-upload');
                            if (uploadDiv) {
                                // Remove existing filename display if any
                                const existingFileName = uploadDiv.querySelector('.file-name');
                                if (existingFileName) {
                                    existingFileName.remove();
                                }

                                // Create and append new filename display
                                const fileNameDisplay = document.createElement('div');
                                fileNameDisplay.className = 'file-name mt-2 small text-muted';
                                fileNameDisplay.textContent = `Selected file: ${file.name}`;
                                uploadDiv.appendChild(fileNameDisplay);
                            }
                        }
                    } catch (error) {
                        console.error('Error in file input handling:', error);
                    }
                });
            }
        });
    </script>
@endpush
