<x-layout>
    <div class="container">
        <h3 class="mb-4"><i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users mr-2"></i>Total Users</h5>
                        <p class="card-text display-4">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-list mr-2"></i>Total Listings</h5>
                        <p class="card-text display-4">{{ $listingsCount }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
