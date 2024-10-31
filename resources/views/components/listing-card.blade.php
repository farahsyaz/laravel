@props(['listing'])

<div
    class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden transition-transform transform hover:scale-105 duration-300">
    {{-- Header with Logo --}}
    <div class="relative h-56 bg-gray-50">
        <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/hiring.jfif') }}"
            alt="{{ $listing->company }} Logo"
            class="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-110">
        {{-- Bookmark Icon --}}
        <div class="absolute top-3 right-3">
            <button class="text-white bg-gray-800/70 rounded-full p-2 hover:bg-blue-600 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Job Details --}}
    <div class="p-5">
        {{-- Job Title --}}
        <h2 class="text-xl font-semibold text-gray-900 hover:text-blue-500 transition">
            {{ $listing->title }}
        </h2>

        {{-- Company Name --}}
        <div class="flex items-center text-gray-500 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-1" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                    clip-rule="evenodd" />
            </svg>
            <span>{{ $listing->company }}</span>
        </div>

        {{-- Tags --}}
        <div class="mt-3">
            <x-listing-tags :tagsCsv="$listing->tags" />
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3 mt-5">
            <a href="/listings/{{ $listing->id }}"
                class="flex-1 inline-flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                </svg>
                View Details
            </a>
            <a href="#"
                class="flex-1 inline-flex items-center justify-center bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
                Apply Now
            </a>
        </div>

        {{-- Posted Date --}}
        <div class="text-sm text-gray-500 mt-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                    clip-rule="evenodd" />
            </svg>
            <span>Posted {{ $listing->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
