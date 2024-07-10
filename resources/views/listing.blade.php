@extends('layout')

@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">{{ $listing->title }}</h2>
                    
                    <x-listing-tags :tagsCsv="$listing->tags" />
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Company:</strong> {{ $listing->company }}</p>
                            <p class="card-text"><strong>Location:</strong> {{ $listing->location }}</p>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <a href="mailto:{{ $listing->email }}" class="btn btn-primary">Contact Employer</a>
                            <a href="{{ $listing->website }}" class="btn btn-outline-secondary ml-2">Visit Website</a>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h5 class="mt-4">Job Description</h5>
                    <p class="card-text">{{ $listing->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
