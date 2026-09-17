@extends('layouts.app', ['pageCss' => 'legal', 'bodyClass' => 'page-legal'])

@section('content')
    <section class="legal-hero">
        <div class="shell shell--narrow">
            <nav class="crumb-light" aria-label="Fil d'ariane">
                <a href="{{ route('home') }}">Accueil</a>
                <x-icon name="chevron-right" />
                <strong>{{ $pageTitle }}</strong>
            </nav>
            <h1 class="h-lg">{{ $pageTitle }}</h1>
        </div>
    </section>

    <section class="section">
        <div class="shell shell--narrow legal-body">
            @foreach ($blocks as $block)
                <article class="legal-block" data-reveal>
                    <h2 class="h-sm">{{ $block['title'] }}</h2>
                    <p>{{ $block['text'] }}</p>
                </article>
            @endforeach

            <p class="legal-updated">Derniere mise a jour : {{ now()->translatedFormat('F Y') }}.</p>
        </div>
    </section>
@endsection
