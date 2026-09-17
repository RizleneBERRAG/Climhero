@extends('layouts.app')

@php
    $contact = config('climhero.contact');
    $services = config('services_catalog');
    $certifications = config('climhero.certifications');
@endphp

@section('content')

    <section class="city-hero">
        <div class="shell">
            <nav class="crumb-light" aria-label="Fil d'ariane">
                <a href="{{ route('home') }}">Accueil</a>
                <x-icon name="chevron-right" />
                <a href="{{ route('home') }}#zone">Zone d'intervention</a>
                <x-icon name="chevron-right" />
                <strong>{{ $city['name'] }}</strong>
            </nav>

            <div class="city-hero__inner">
                <div>
                    <span class="chip chip--light">
                        <x-icon name="pin" />
                        {{ $city['postal'] }} {{ $city['name'] }}, a {{ $city['distance'] }} de notre atelier
                    </span>
                    <h1 class="city-hero__title">
                        Installateur de pompe a chaleur et de climatisation a {{ $city['name'] }}
                    </h1>
                    <p class="city-hero__lede">{{ $city['intro'] }}</p>
                    <div class="city-hero__actions">
                        <a class="btn btn--primary btn--lg" href="{{ route('contact') }}">
                            Devis gratuit a {{ $city['name'] }}
                            <x-icon name="arrow-right" class="ico" />
                        </a>
                        <a class="btn btn--ghost-light btn--lg" href="tel:{{ $contact['phone_link'] }}">
                            <x-icon name="phone" class="ico" />
                            {{ $contact['phone'] }}
                        </a>
                    </div>
                </div>

                <ul class="city-hero__focus">
                    <li class="city-hero__focus-title">Ce que nous faisons le plus a {{ $city['name'] }}</li>
                    @foreach ($city['focus'] as $item)
                        <li><x-icon name="check-circle" /> {{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Nos prestations a {{ $city['name'] }}</span>
                <h2 class="h-lg">Tous nos metiers interviennent sur la commune</h2>
            </div>

            <div class="others" data-reveal-group>
                @foreach ($services as $service)
                    <a class="other" data-accent="{{ $service['accent'] }}" href="{{ route('service', $service['slug']) }}" data-reveal>
                        <span class="other__ico"><x-icon :name="$service['icon']" /></span>
                        <span>
                            <strong>{{ $service['title'] }} a {{ $city['name'] }}</strong>
                            <em>{{ $service['baseline'] }}</em>
                        </span>
                        <x-icon name="arrow-right" class="other__arrow" />
                    </a>
                @endforeach
            </div>

            <div class="city-proof" data-reveal>
                <div class="badges">
                    @foreach ($certifications as $cert)
                        <div class="badge">
                            <span class="badge__seal"><x-icon name="shield" /></span>
                            <span>
                                <span class="badge__label">{{ $cert['label'] }}</span>
                                <span class="badge__detail">{{ $cert['detail'] }}</span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
