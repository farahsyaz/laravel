@props(['listing'])

@push('styles')
    <style>
        .job-card {
            display: flex;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .job-card__image {
            flex: 0 0 200px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .job-card__image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .job-card__content {
            flex: 1;
            padding: 20px;
        }

        .job-card__title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .job-card__company {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .job-card__tags {
            margin-bottom: 15px;
        }

        .job-card__actions {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .job-card__date {
            font-size: 0.875rem;
            color: #888;
            margin-bottom: 0;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tag {
            background-color: #e9ecef;
            color: #495057;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.875rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .tag:hover {
            background-color: #dee2e6;
            color: #212529;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .job-card {
                flex-direction: column;
            }

            .job-card__image {
                height: 200px;
            }
        }
    </style>
@endpush

<div class="job-card">
    <div class="job-card__image">
        <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/hiring.jfif') }}"
            alt="{{ $listing->company }} Logo">
    </div>
    <div class="job-card__content">
        <h2 class="job-card__title">{{ $listing->title }}</h2>
        <p class="job-card__company">
            <i class="fas fa-building"></i> {{ $listing->company }}
        </p>
        <div class="job-card__tags">
            <x-listing-tags :tagsCsv="$listing->tags" />
        </div>
        <div class="job-card__actions">
            <a href="/listings/{{ $listing->id }}" class="btn btn-primary">
                <i class="fas fa-info-circle"></i> View Details
            </a>
            <a href="#" class="btn btn-outline-secondary">
                <i class="fas fa-paper-plane"></i> Apply Now
            </a>
        </div>
        <p class="job-card__date">Posted {{ $listing->created_at->diffForHumans() }}</p>
    </div>
</div>
