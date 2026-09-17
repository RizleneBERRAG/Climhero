@props(['name' => 'check', 'class' => 'ico'])

@php
    $paths = [
        'snowflake' => '<path d="M12 2v20"/><path d="m4.93 5.93 14.14 14.14"/><path d="M19.07 5.93 4.93 20.07"/><path d="M12 6.5 9 4m3 2.5L15 4m-3 13.5L9 20m3-2.5 3 2.5"/><path d="m6.5 9-3.3-.9M6.5 9 5.6 5.7m11.9 3.3 3.3-.9M17.5 9l.9-3.3M6.5 15l-3.3.9m3.3-.9-.9 3.3m11.9-3.3 3.3.9m-3.3-.9.9 3.3"/>',
        'flame' => '<path d="M12 2c1.5 3.5-1 5.5-2.2 7.2A6.6 6.6 0 0 0 8.5 13a3.5 3.5 0 0 0 7 0c0-1-.4-1.9-1-2.6 2.4 1 4 3.3 4 6a6.5 6.5 0 1 1-13 0c0-3.2 1.6-5.4 3.3-7.4C10.6 6.8 12.3 4.9 12 2Z"/>',
        'wind' => '<path d="M12.8 19.6A2 2 0 1 0 14 16H2"/><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"/><path d="M9.8 4.4A2 2 0 1 1 11 8H2"/>',
        'sun' => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.9 4.9l1.4 1.4m11.4 11.4 1.4 1.4M2 12h2m16 0h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>',
        'box' => '<path d="M21 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3"/><rect x="3" y="8" width="18" height="13" rx="2"/><path d="M12 8v13M8 12h1m6 0h1"/>',
        'droplet' => '<path d="M12 2.7 6.8 8.2a7.4 7.4 0 1 0 10.4 0Z"/>',
        'phone' => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/>',
        'mail' => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/>',
        'pin' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'clock' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'check' => '<path d="m20 6-11 11-5-5"/>',
        'check-circle' => '<circle cx="12" cy="12" r="10"/><path d="m8 12 3 3 5-6"/>',
        'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/>',
        'arrow-right' => '<path d="M5 12h14"/><path d="m13 6 6 6-6 6"/>',
        'arrow-down' => '<path d="M12 5v14"/><path d="m6 13 6 6 6-6"/>',
        'chevron-down' => '<path d="m6 9 6 6 6-6"/>',
        'chevron-right' => '<path d="m9 6 6 6-6 6"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'star' => '<path d="m12 3 2.9 5.9 6.5.9-4.7 4.6 1.1 6.5L12 17.8 6.2 20.9l1.1-6.5L2.6 9.8l6.5-.9Z"/>',
        'quote' => '<path d="M10 11H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v8a4 4 0 0 1-4 4"/><path d="M20 11h-4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v8a4 4 0 0 1-4 4"/>',
        'facebook' => '<path d="M16 3h-3a4 4 0 0 0-4 4v3H6v4h3v7h4v-7h3l1-4h-4V7a1 1 0 0 1 1-1h3Z"/>',
        'map' => '<path d="m9 4 6 2 5-2v14l-5 2-6-2-5 2V6Z"/><path d="M9 4v14m6-12v14"/>',
        'euro' => '<path d="M18 5.5A7 7 0 0 0 7.5 12 7 7 0 0 0 18 18.5"/><path d="M3 10h9M3 14h9"/>',
        'bolt' => '<path d="M13 2 4 14h7l-1 8 9-12h-7Z"/>',
        'leaf' => '<path d="M11 20A7 7 0 0 1 4 13c0-6 7-10 16-10 0 9-4 16-10 16Z"/><path d="M4 20c3-4 6-6 10-7"/>',
        'wrench' => '<path d="M14.7 6.3a4 4 0 0 0 5.3 5.2l-8 8a3 3 0 0 1-4.2-4.2l8-8Z"/><path d="m14.7 6.3-2-2a3 3 0 0 0-4.2 0l-2 2a3 3 0 0 0 0 4.2l2 2"/>',
        'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 11h18"/>',
        'sparkles' => '<path d="m12 3 1.9 4.6L18.5 9.5l-4.6 1.9L12 16l-1.9-4.6L5.5 9.5l4.6-1.9Z"/><path d="M19 14.5 19.8 16.4 21.7 17.2 19.8 18 19 19.9 18.2 18 16.3 17.2 18.2 16.4Z"/>',
        'alert' => '<circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16.5v.01"/>',
        'download' => '<path d="M12 3v12"/><path d="m7 11 5 5 5-5"/><path d="M4 20h16"/>',
        'thermometer' => '<path d="M14 14.8V5a2 2 0 1 0-4 0v9.8a4 4 0 1 0 4 0Z"/>',
        'home' => '<path d="m3 10 9-7 9 7v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/><path d="M9 21v-7h6v7"/>',
        'building' => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M9 8h.01M15 8h.01M9 12h.01M15 12h.01M10 21v-4h4v4"/>',
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
        'logout' => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/>',
        'filter' => '<path d="M3 5h18l-7 8v6l-4 2v-8Z"/>',
        'inbox' => '<path d="M22 12h-6l-2 3h-4l-2-3H2"/><path d="M5.4 5.1 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.4-6.9A2 2 0 0 0 16.8 4H7.2a2 2 0 0 0-1.8 1.1Z"/>',
    ];
@endphp

<svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
    {!! $paths[$name] ?? $paths['check'] !!}
</svg>
