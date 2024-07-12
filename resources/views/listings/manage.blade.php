<x-layout>
<div class="container mt-5">
    <x-card>
        <div class="card-header">
            <h3>Manage Job Listings</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listings as $listing)
                    <tr>
                        <td>{{ $listing->id }}</td>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->company }}</td>
                        <td>{{ $listing->location }}</td>
                        <td>
                            <a href="/listings/{{ $listing->id }}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="POST" action="/listings/{{ $listing->id }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
</div>
</x-layout>