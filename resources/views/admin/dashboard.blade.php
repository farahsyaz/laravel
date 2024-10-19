<x-layout>
    <div class="container-fluid mt-4">
        <div class="row align-items-center mb-4">
            <div class="col">
                <h1 class="h3"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <h5 class="card-title text-uppercase mb-1">Total Users</h5>
                                <div class="h2 mb-0 font-weight-bold">{{ $usersCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <h5 class="card-title text-uppercase mb-1">Total Listings</h5>
                                <div class="h2 mb-0 font-weight-bold">{{ $listingsCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-layout>
