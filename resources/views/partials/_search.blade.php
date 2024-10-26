@push('styles')
    <style>
        .search-form {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .search-form:focus-within {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .search-input {
            border: none;
            padding: 15px 20px;
            font-size: 1.1rem;
            border-radius: 50px 0 0 50px;
        }

        .search-input:focus {
            box-shadow: none;
        }

        .search-btn {
            background-color: #6e8efb;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 0 50px 50px 0;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #5c7cfa;
        }

        @media (max-width: 767.98px) {
            .search-btn {
                padding: 15px 20px;
            }
        }
    </style>
@endpush

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="search-form">
                <div class="input-group">
                    <input type="search" class="form-control search-input" placeholder="Search for jobs..."
                        aria-label="Search" name="search">
                    <button class="btn search-btn" type="submit">
                        <i class="fas fa-search"></i>
                        <span class="d-none d-md-inline">Search</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
