<x-layout>
    <div class="container mt-5">
        <x-card>
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-4"><i class="fas fa-tasks mr-2"></i>Manage Listings</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('listings.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create
                            Job Listing</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($listings->isEmpty())
                    <div class="alert alert-danger" role="alert">
                        No listings found.
                    </div>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Company</th>
                                <th>Location</th>
                                @if (auth()->user() && auth()->user()->isAdmin())
                                    <th>Posted By</th>
                                @endif
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{ $listing->title }}</td>
                                    <td>{{ $listing->company }}</td>
                                    <td>{{ $listing->location }}</td>
                                    @if (auth()->user() && auth()->user()->isAdmin())
                                        <td>{{ $listing->user->name }}</td>
                                    @endif
                                    <td>{{ $listing->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/listings/{{ $listing->id }}" class="btn btn-sm btn-success me-2">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="/listings/{{ $listing->id }}/edit"
                                                class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <x-confirm-delete :action="'/listings/' . $listing->id"
                                                message="Are you sure you want to delete this listing?" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </x-card>
    </div>
</x-layout>
