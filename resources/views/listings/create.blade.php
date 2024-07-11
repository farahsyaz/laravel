<x-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-card>
                    <div class="card-body">
                        <h2 class="card-title">Create Job Listing</h2>
                        <form action="/listings" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" >
                                @error('title')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tags">Tags (comma-separated)</label>
                                <input type="text" class="form-control" id="tags" name="tags">
                                 @error('tags')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company" name="company" >
                                 @error('company')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" >
                                 @error('location')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" >
                                 @error('email')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website">
                                 @error('website')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" ></textarea>
                                 @error('description')
                                	<span class="text-danger text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layout>
