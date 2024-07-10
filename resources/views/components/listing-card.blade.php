@props(['listing'])

<div class="card mb-4 shadow-sm">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="{{ asset('images/hiring.jfif') }}" class="card-img" alt="Listing Image">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">
                    <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                </h2>
                
                <x-listing-tags :tagsCsv="$listing->tags" />
                
                <p class="card-text"><strong>Company:</strong> {{ $listing->company }}</p>
            </div>
        </div>
    </div>
</div>
