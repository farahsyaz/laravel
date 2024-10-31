@props(['listing'])

<div
    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
    <div class="w-full h-48 overflow-hidden bg-gray-100">
        <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/hiring.jfif') }}"
            alt="{{ $listing->company }} Logo" class="w-full h-full object-cover object-center">
    </div>

    <div class="p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors duration-300">
            {{ $listing->title }}
        </h2>

        <p class="flex items-center text-gray-600 mb-4">
            <i class="fas fa-building mr-2 text-gray-500"></i>
            {{ $listing->company }}
        </p>

        <div class="mb-4">
            <x-listing-tags :tagsCsv="$listing->tags" />
        </div>

        <div class="flex flex-col sm:flex-row gap-3 mb-4">
            <a href="/listings/{{ $listing->id }}"
                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-300">
                <i class="fas fa-info-circle mr-2"></i>
                View Details
            </a>

            <a href="#"
                class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors duration-300">
                <i class="fas fa-paper-plane mr-2"></i>
                Apply Now
            </a>
        </div>

        <p class="text-sm text-gray-500">
            Posted {{ $listing->created_at->diffForHumans() }}
        </p>
    </div>
</div>
