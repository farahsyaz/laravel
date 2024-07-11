<x-layout>
    <!-- Include Hero Partial -->
    @include('partials._hero')

    <!-- Include Search Partial -->
    @include('partials._search')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Job Listings</h1>

                @if(count($listings) == 0)
                    <div class="alert alert-danger" role="alert">
                        No Listings found!
                    </div>
                @else
                    <div class="row">
                        @foreach($listings as $listing)
                            <div class="col-md-6 mb-4">
                                <x-listing-card :listing="$listing" />
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

         <div class="mt-6 p-4">
            {{ $listings->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

</x-layout>