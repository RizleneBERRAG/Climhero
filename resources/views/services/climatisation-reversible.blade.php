@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($service['faq']), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    @include('services.partials.hero')

    {{-- Section propre a la climatisation : grille tarifaire indicative --}}
    <section class="section svc-extra">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Budget</span>
                <h2 class="h-lg">Combien coute une climatisation reversible en 2026</h2>
                <p class="lede">
                    Fourchettes constatees sur nos chantiers en Nord-Isere et dans l'Est lyonnais,
                    pose, mise en service et materiel compris. Le prix final depend surtout de la
                    longueur des liaisons et de l'accessibilite du groupe exterieur.
                </p>
            </div>

            <div class="price-table" data-reveal-group>
                @foreach ([
                    ['config' => 'Mono-split', 'surface' => 'Une piece jusqu a 35 m2', 'price' => '1 900 a 2 900 euros', 'duree' => 'Une demi-journee'],
                    ['config' => 'Bi-split', 'surface' => 'Sejour et une chambre', 'price' => '3 400 a 4 600 euros', 'duree' => 'Une journee'],
                    ['config' => 'Multi-split 3 a 4 unites', 'surface' => 'Maison de 90 a 130 m2', 'price' => '5 500 a 9 000 euros', 'duree' => 'Un a deux jours'],
                    ['config' => 'Gainable', 'surface' => 'Maison avec combles amenageables', 'price' => '9 000 a 15 000 euros', 'duree' => 'Deux a trois jours'],
                ] as $row)
                    <div class="price-row" data-reveal>
                        <div class="price-row__config">
                            <x-icon name="snowflake" />
                            <strong>{{ $row['config'] }}</strong>
                        </div>
                        <div class="price-row__cell"><span>Pour</span>{{ $row['surface'] }}</div>
                        <div class="price-row__cell"><span>Budget indicatif</span>{{ $row['price'] }}</div>
                        <div class="price-row__cell"><span>Duree du chantier</span>{{ $row['duree'] }}</div>
                    </div>
                @endforeach
            </div>

            <p class="price-note">
                Ces montants sont donnes a titre indicatif et ne remplacent pas un devis.
                La visite technique est gratuite et permet de figer le prix avant toute signature.
            </p>
        </div>
    </section>

    @include('services.partials.body')

@endsection
