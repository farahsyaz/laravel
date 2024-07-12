@props(['listing'])

<x-card>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('/images/no-image.jfif') }}" class="card-img" alt="Listing Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="/listings/{{ $listing->id }}" class="text-decoration-none text-dark">{{ $listing->title }}</a>
                    </h2>
                    
                    <x-listing-tags :tagsCsv="$listing->tags" />
                    
                    <p class="card-text"><strong><i class="fas fa-building"></i> Company:</strong> {{ $listing->company }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-info-circle"></i> View Details</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-check-circle"></i> Apply Now</a>
                        </div>
                        
                    </div>
                    <div>
                        <small class="text-muted">{{ $listing->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
</x-card>
