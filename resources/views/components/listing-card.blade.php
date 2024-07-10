@props(['listing'])
<x-card>
 <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('images/hiring.jfif') }}" class="card-img" alt="Listing Image">

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
                            </h2>
                            <p class="card-text">{{$listing->company}}</p>
                            <p class="card-text">{{$listing->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
</x-card>