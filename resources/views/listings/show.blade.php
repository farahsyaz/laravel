<x-layout>
    <style>
        .job-listing-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            transition: all 0.2s ease-in-out;
        }
        
        .job-listing-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }
        
        .company-logo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 0.75rem;
        }
        
        .tag-container {
            gap: 0.5rem;
        }
        
        .listing-tag {
            background-color: #e2e8f0;
            color: #334155;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .listing-tag:hover {
            background-color: #cbd5e1;
        }
        
        .contact-btn {
            transition: all 0.2s ease;
        }
        
        .contact-btn:hover {
            transform: translateY(-1px);
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="job-listing-card p-4">
                    <div class="row g-4">
                        <!-- Company Logo Section -->
                        <div class="col-md-4">
                            <img 
                                src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('/images/hiring.jfif') }}" 
                                class="company-logo shadow-sm"
                                alt="{{ $listing->company }} logo"
                            >
                        </div>

                        <!-- Job Details Section -->
                        <div class="col-md-8">
                            <div class="d-flex flex-column h-100">
                                <!-- Header -->
                                <div class="mb-4">
                                    <h1 class="h2 mb-3">{{ $listing->title }}</h1>
                                    <div class="d-flex flex-wrap tag-container">
                                        <x-listing-tags :tagsCsv="$listing->tags" />
                                    </div>
                                </div>

                                <!-- Company Info -->
                                <div class="mb-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-building text-secondary me-2"></i>
                                                <span>{{ $listing->company }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                                                <span>{{ $listing->location }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div class="mb-4">
                                    <h5 class="mb-3">About This Role</h5>
                                    <p class="text-secondary">{{ $listing->description }}</p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-auto">
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="mailto:{{ $listing->email }}" 
                                           class="btn btn-primary contact-btn">
                                            <i class="fas fa-envelope me-2"></i>Contact Employer
                                        </a>
                                        <a href="{{ $listing->website }}" 
                                           class="btn btn-outline-secondary contact-btn">
                                            <i class="fas fa-globe me-2"></i>Visit Website
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>