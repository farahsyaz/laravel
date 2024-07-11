@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

@foreach($tags as $tag)
    <span class="badge badge-dark me-2 mb-2">
        <a href="/?tag={{ $tag }}" class="text-white text-decoration-none">{{ $tag }}</a>
    </span>
@endforeach
