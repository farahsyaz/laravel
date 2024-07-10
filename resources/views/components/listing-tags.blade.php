@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

@foreach($tags as $tag)
    <span class="badge badge-dark mr-2 mb-2">
        <a href="/?tag={{ $tag }}" class="text-white">{{ $tag }}</a>
    </span>
@endforeach
