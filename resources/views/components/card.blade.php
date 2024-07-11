<!-- resources/views/components/card.blade.php -->
<div {{ $attributes->merge(['class' => 'card shadow-sm']) }}>
    {{ $slot }}
</div>
