```blade
@extends('layouts.app')

@push('styles')
    <style>
        /* Hero Section Styles */
        .hero {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 4rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%237c3aed' fill-opacity='0.1' fill-rule='evenodd'/%3E</svg>");
            opacity: 0.5;
        }

        .hero__content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
        }

        .hero__title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero__subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Search Section Styles */
        .search-section {
            margin-top: -2.5rem;
            margin-bottom: 3rem;
            position: relative;
            z-index: 2;
        }

        .search-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 1.5rem;
        }

        .search-input {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .search-btn {
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        /* Listings Section Styles */
        .listings-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .listings-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
        }

        .listings-count {
            color: #6b7280;
            font-size: 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: #f9fafb;
            border-radius: 16px;
            border: 2px dashed #e5e7eb;
        }

        .empty-state__icon {
            font-size: 3rem;
            color: #9ca3af;
            margin-bottom: 1rem;
        }

        .empty-state__title {
            font-size: 1.5rem;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .empty-state__text {
            color: #6b7280;
            max-width: 400px;
            margin: 0 auto;
        }

        /* Pagination Styles */
        .pagination-wrapper {
            margin-top: 3rem;
            padding: 1rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero__content">
            <div class="container">
                <h1 class="hero__title">Find Your Dream Job</h1>
                <p class="hero__subtitle">
                    Discover thousands of job opportunities from top companies around the world
                </p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="search-card">
                <form action="" method="GET">
                    <div class="row g-3">
                        <div class="col-md-10">
                            <input type="text" 
                                   name="search" 
                                   class="form-control search-input" 
                                   placeholder="Search jobs by title, company, or keywords..."
                                   value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn search-btn w-100">
                                <i class="fas fa-search me-2"></i>Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Listings Section -->
    <section class="listings-section">
        <div class="container">
            <div class="listings-header">
                <h2 class="listings-title">Available Positions</h2>
                <span class="listings-count">{{ $listings->total() }} jobs found</span>
            </div>

            @if ($listings->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-briefcase empty-state__icon"></i>
                    <h3 class="empty-state__title">No Listings Found</h3>
                    <p class="empty-state__text">
                        We couldn't find any job listings matching your criteria. 
                        Try adjusting your search or check back later for new opportunities.
                    </p>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($listings as $listing)
                        <div class="col-md-6">
                            <x-listing-card :listing="$listing" />
                        </div>
                    @endforeach
                </div>

                <div class="pagination-wrapper">
                    {{ $listings->links('vendor.pagination.bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
@endsection
```