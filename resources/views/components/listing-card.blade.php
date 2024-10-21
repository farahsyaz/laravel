@props(['listing'])

<div class="job-card">
    <div class="job-card__image">
        <img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('/images/hiring.jfif') }}" alt="{{ $listing->company }} Logo">
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
            <a href="#" class="btn btn-outline-primary">
                <i class="fas fa-paper-plane"></i> Apply Now
            </a>
        </div>
        <p class="job-card__date">Posted {{ $listing->created_at->diffForHumans() }}</p>
    </div>
</div>