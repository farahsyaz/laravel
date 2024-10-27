@extends('layouts.app')

@push('styles')
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --success-color: #4CAF50;
        --info-color: #2196F3;
        --warning-color: #ff9800;
        --danger-color: #f44336;
    }

    body {
        background-color: #f8f9fa;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 1.5rem 0;
        margin-bottom: 2rem;
        color: white;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
    }

    .stat-card.users::before { background: var(--primary-color); }
    .stat-card.listings::before { background: var(--success-color); }
    .stat-card.revenue::before { background: var(--info-color); }
    .stat-card.orders::before { background: var(--warning-color); }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .icon-users { background: var(--primary-color); }
    .icon-listings { background: var(--success-color); }
    .icon-revenue { background: var(--info-color); }
    .icon-orders { background: var(--warning-color); }

    .stat-title {
        color: #6c757d;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 700;
        color: #2d3436;
        margin: 0.5rem 0;
    }

    .trend {
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .trend-up {
        color: var(--success-color);
    }

    .trend-down {
        color: var(--danger-color);
    }

    .chart-card {
        background: white;
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        margin-top: 2rem;
    }

    .chart-card .card-header {
        background: transparent;
        border-bottom: 1px solid #eee;
        padding: 1.25rem;
    }

    .card-header-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3436;
        margin: 0;
    }

    .quick-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .action-btn {
        flex: 1;
        padding: 1rem;
        border-radius: 12px;
        border: none;
        background: white;
        color: #2d3436;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .action-btn i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
    }

    .action-btn span {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            border-radius: 0;
        }
        
        .quick-actions {
            flex-wrap: wrap;
        }
        
        .action-btn {
            flex: 1 1 calc(50% - 0.5rem);
        }
    }
</style>
@endpush

@section('content')
    <div class="dashboard-header">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <h1 class="h3 mb-0">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Admin Dashboard
                </h1>
                <div class="ms-auto">
                    <span class="text-white-50">Last updated: {{ date('M d, Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card stat-card users">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon icon-users">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>12%</span>
                            </div>
                        </div>
                        <h6 class="stat-title">Total Users</h6>
                        <div class="stat-value">{{ number_format($usersCount) }}</div>
                        <small class="text-muted">+128 this month</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card stat-card listings">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon icon-listings">
                                <i class="fas fa-list"></i>
                            </div>
                            <div class="trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>8%</span>
                            </div>
                        </div>
                        <h6 class="stat-title">Total Listings</h6>
                        <div class="stat-value">{{ number_format($listingsCount) }}</div>
                        <small class="text-muted">+43 this month</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card stat-card revenue">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon icon-revenue">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>15%</span>
                            </div>
                        </div>
                        <h6 class="stat-title">Total Revenue</h6>
                        <div class="stat-value">$45,289</div>
                        <small class="text-muted">+$5,840 this month</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card stat-card orders">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="stat-icon icon-orders">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="trend trend-down">
                                <i class="fas fa-arrow-down"></i>
                                <span>3%</span>
                            </div>
                        </div>
                        <h6 class="stat-title">Total Orders</h6>
                        <div class="stat-value">1,259</div>
                        <small class="text-muted">-8 this month</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <button class="action-btn">
                <i class="fas fa-plus"></i>
                <span>Add Listing</span>
            </button>
            <button class="action-btn">
                <i class="fas fa-user-plus"></i>
                <span>Add User</span>
            </button>
            <button class="action-btn">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </button>
            <button class="action-btn">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
            </button>
        </div>

        <!-- Charts -->
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card chart-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-header-title">Revenue Overview</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                This Month
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder for chart -->
                        <div style="height: 300px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <span class="text-muted">Revenue Chart</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card chart-card">
                    <div class="card-header">
                        <h6 class="card-header-title">User Statistics</h6>
                    </div>
                    <div class="card-body">
                        <!-- Placeholder for chart -->
                        <div style="height: 300px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <span class="text-muted">Users Chart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection