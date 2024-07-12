<x-layout>
    <div class="container mt-5">
        <x-card>
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3>Job Listings</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('listings.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Job Post</a>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{ $listing->title }}</td>
                                    <td>{{ $listing->company }}</td>
                                    <td>{{ $listing->location }}</td>
                                    <td>
                                        <a href="/listings/{{ $listing->id }}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> View</a>
                                        <a href="/listings/{{ $listing->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <form method="POST" action="/listings/{{ $listing->id }}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this listing?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
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
