<x-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-card>
                    <div class="card-body">
                        <h2 class="card-title">Edit Job Listing</h2>
                        <form action="/listings/{{$listing->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" class="form-control" id="company" name="company" value="{{$listing->company}}">
                                @error('company')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
    <label for="logo" class="form-label">Company Logo</label><br>
    <img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('/images/no-image.jfif') }}" class="card-img img-thumbnail mb-2" alt="Listing Image" style="max-width: 200px; max-height: 200px;">
    <input type="file" class="form-control-file mt-2" id="logo" name="logo">
    @error('logo')
        <span class="text-danger text-sm">{{$message}}</span>
    @enderror
</div>


                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{$listing->location}}">
                                @error('location')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$listing->email}}">
                                @error('email')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{$listing->website}}">
                                @error('website')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Job Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$listing->title}}">
                                @error('title')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags (comma-separated)</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="{{$listing->tags}}">
                                @error('tags')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Job Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5">{{$listing->description}}</textarea>
                                @error('description')
                                    <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layout>
