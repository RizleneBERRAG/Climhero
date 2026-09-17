@php
    $mediaSrc = $src ?? null;
    $mediaExists = $mediaSrc && is_file(public_path($mediaSrc));
@endphp

<figure class="media {{ $class ?? '' }}" data-accent="{{ $accent ?? 'cool' }}">
    @if ($mediaExists)
        <img src="{{ climhero_asset($mediaSrc) }}" alt="{{ $alt ?? '' }}" loading="lazy" decoding="async">
    @else
        <span class="media__ph" aria-hidden="true">
            <x-icon :name="$icon ?? 'thermometer'" />
        </span>
    @endif
</figure>
