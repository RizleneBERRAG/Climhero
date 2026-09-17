@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($service['faq']), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    @include('services.partials.hero')

    {{-- Section propre au photovoltaique : dimensionnement indicatif --}}
    <section class="section svc-extra">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Dimensionnement</span>
                <h2 class="h-lg">Quelle puissance pour quel foyer</h2>
                <p class="lede">
                    Base de calcul : une toiture orientee au sud, inclinee a 30 degres, sans masque significatif,
                    dans la region lyonnaise, soit environ 1 200 kWh produits par kWc et par an.
                </p>
            </div>

            <div class="pv-grid" data-reveal-group>
                @foreach ([
                    ['kwc' => '3 kWc', 'panneaux' => '7 panneaux', 'prod' => '3 600 kWh par an', 'profil' => 'Couple sans chauffage electrique'],
                    ['kwc' => '6 kWc', 'panneaux' => '14 panneaux', 'prod' => '7 200 kWh par an', 'profil' => 'Famille avec ballon thermodynamique'],
                    ['kwc' => '9 kWc', 'panneaux' => '20 panneaux', 'prod' => '10 800 kWh par an', 'profil' => 'Maison avec pompe a chaleur'],
                    ['kwc' => '12 kWc', 'panneaux' => '27 panneaux', 'prod' => '14 400 kWh par an', 'profil' => 'PAC et vehicule electrique'],
                ] as $row)
                    <article class="pv-card" data-reveal>
                        <span class="pv-card__kwc">{{ $row['kwc'] }}</span>
                        <span class="pv-card__sun" aria-hidden="true"><x-icon name="sun" /></span>
                        <ul>
                            <li><span>Surface</span>{{ $row['panneaux'] }}</li>
                            <li><span>Production estimee</span>{{ $row['prod'] }}</li>
                            <li><span>Profil type</span>{{ $row['profil'] }}</li>
                        </ul>
                    </article>
                @endforeach
            </div>

            <div class="pv-note" data-reveal>
                <x-icon name="alert" />
                <p>
                    Couvrir toute la toiture n'a d'interet que si vous consommez la production sur place.
                    Notre etude part de votre courbe de charge reelle, pas d'un catalogue. Nous vous dirons
                    aussi, le cas echeant, que votre toiture ne s'y prete pas.
                </p>
            </div>
        </div>
    </section>

    @include('services.partials.body')

@endsection
