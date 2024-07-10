@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row">
            <x-card>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $listing->title }}</h2>
                    <p class="card-text"><strong>Tags:</strong> {{ $listing->tags }}</p>
                    <p class="card-text"><strong>Company:</strong> {{ $listing->company }}</p>
                    <p class="card-text"><strong>Location:</strong> {{ $listing->location }}</p>
                    <h5>Job Description</h5>
                    <p class="card-text">{{ $listing->description }}</p>
                    <a href="mailto:{{ $listing->email }}" class="btn btn-primary">Contact Employer</a>
                    <a href="{{ $listing->website }}" class="btn btn-secondary">Visit Website</a>
                </div>
            </div>
        </x-card>
    </div>
</div>
@endsection
