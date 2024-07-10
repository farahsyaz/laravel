@extends('layout')
  
@section('content')
<!-- Include Hero Partial -->
    @include('partials._hero')
<div class="row">
    <div class="col-md-12">
        <h1>{{$heading}}</h1>

        @if(count($listings) == 0)
            <p class="alert alert-danger">No Listings found!</p>
        @else
            @foreach($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @endif
    </div>
</div>
@endsection
