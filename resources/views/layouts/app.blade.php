@php
    $brand = config('climhero.brand');
    $contact = config('climhero.contact');
    $pageCss = $pageCss ?? null;
    $pageJs = $pageJs ?? null;
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0a1a2b">

    <title>{{ $metaTitle ?? ($brand['name'] . ' | ' . $brand['baseline']) }}</title>
    <meta name="description" content="{{ $metaDescription ?? $brand['claim'] }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="{{ $brand['name'] }}">
    <meta property="og:title" content="{{ $metaTitle ?? $brand['name'] }}">
    <meta property="og:description" content="{{ $metaDescription ?? $brand['claim'] }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ climhero_asset('css/base.css') }}">
    @if ($pageCss)
        <link rel="stylesheet" href="{{ climhero_asset('css/pages/' . $pageCss . '.css') }}">
    @endif
    @stack('styles')

    <script type="application/ld+json">@json(climhero_local_business_schema(), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
    @stack('schema')
</head>
<body class="{{ $bodyClass ?? '' }}">

<a class="skip-link" href="#contenu">Aller au contenu principal</a>

@include('partials.header')

<main id="contenu">
    @yield('content')
</main>

@includeUnless($hideCta ?? false, 'partials.cta-band')
@include('partials.footer')
@include('partials.action-bar')

<script src="{{ climhero_asset('js/base.js') }}" defer></script>
@if ($pageJs)
    <script src="{{ climhero_asset('js/pages/' . $pageJs . '.js') }}" defer></script>
@endif
@stack('scripts')

</body>
</html>
