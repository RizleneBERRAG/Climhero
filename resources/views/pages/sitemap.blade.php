@extends('layouts.app', ['pageCss' => 'legal', 'bodyClass' => 'page-legal'])

@section('content')
    <section class="legal-hero">
        <div class="shell shell--narrow">
            <nav class="crumb-light" aria-label="Fil d'ariane">
                <a href="{{ route('home') }}">Accueil</a>
                <x-icon name="chevron-right" />
                <strong>Plan du site</strong>
            </nav>
            <h1 class="h-lg">Plan du site</h1>
        </div>
    </section>

    <section class="section">
        <div class="shell shell--narrow">
            <ul class="sitemap-list">
                @foreach ($urls as $url)
                    <li>
                        <a href="{{ $url['loc'] }}">
                            <span>{{ $url['label'] }}</span>
                            <x-icon name="arrow-right" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
