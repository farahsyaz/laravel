<x-layout>
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <x-card>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('/images/hiring.jfif') }}" class="card-img img-fluid rounded" alt="Listing Image">
                            </div>
                            <div class="col-md-8">
                                <h2 class="card-title mb-3">{{ $listing->title }}</h2>
                                
                                <x-listing-tags :tagsCsv="$listing->tags" />
                                
                                <hr>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p class="card-text"><strong><i class="fas fa-building"></i> Company:</strong> {{ $listing->company }}</p>
                                        <p class="card-text"><strong><i class="fas fa-map-marker-alt"></i> Location:</strong> {{ $listing->location }}</p>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <h5 class="mb-3">Job Description</h5>
                                <p class="card-text">{{ $listing->description }}</p>

                                <div class="row mb-3">
                                    <div class="col-12 mt-2">
                                        <a href="mailto:{{ $listing->email }}" class="btn btn-primary mx-1">
                                            <i class="fas fa-envelope"></i> Contact Employer
                                        </a>
                                        <a href="{{ $listing->website }}" class="btn btn-outline-secondary mx-1">
                                            <i class="fas fa-globe"></i> Visit Website
                                        </a>
                                    </div>
                                 </div>

                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layout>
