<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-background"></div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="hero-title">Welcome to JOB Finder</h1>
                <p class="hero-subtitle">Find the perfect job for your career.</p>
                <a href="{{ route('listings.create') }}" class="btn btn-create-job">Create Job Post</a>
            </div>
        </div>
    </div>
</section>

<style>
.hero-section {
    position: relative;
    padding: 100px 0;
    overflow: hidden;
    background-color: #f8f9fa;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    z-index: 1;
}

.hero-section .container {
    z-index: 2;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.hero-subtitle {
    font-size: 1.5rem;
    color: #ffffff;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.btn-create-job {
    background-color: #ffffff;
    color: #6e8efb;
    border: none;
    padding: 12px 30px;
    font-size: 1.1rem;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.btn-create-job:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(0,0,0,0.15);
    background-color: #f8f9fa;
    color: #a777e3;
}
</style>