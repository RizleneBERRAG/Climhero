@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($service['faq']), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    @include('services.partials.hero')

    {{-- Section propre au genie climatique : secteurs et deroule d'affaire --}}
    <section class="section svc-extra">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Secteurs</span>
                <h2 class="h-lg">Les environnements que nous traitons</h2>
                <p class="lede">
                    Chaque typologie de batiment impose ses contraintes : charges internes, horaires
                    d'occupation, exigences acoustiques et reglementaires. Nous les integrons des l'etude.
                </p>
            </div>

            <div class="sectors" data-reveal-group>
                @foreach ([
                    ['ico' => 'building', 'title' => 'Bureaux et tertiaire', 'text' => "Plateaux paysagers, salles de reunion et salles serveurs. Enjeu principal : le confort par zone et la maitrise des consommations imposee par le decret tertiaire."],
                    ['ico' => 'box', 'title' => 'Commerces et grandes surfaces', 'text' => "Rooftops, rideaux d'air et gestion des apports lies aux vitrines. Le confort client se joue sur la stabilite de la temperature en entree de magasin."],
                    ['ico' => 'wrench', 'title' => 'Industrie et ateliers', 'text' => "Ventilation de process, extraction de polluants, chauffage de grands volumes et locaux techniques a temperature controlee."],
                    ['ico' => 'users', 'title' => 'Collectivites et sante', 'text' => "Ecoles, salles polyvalentes, cabinets medicaux et EHPAD. Qualite de l'air interieur, acoustique et continuite de service sont prioritaires."],
                ] as $sector)
                    <article class="sector" data-reveal>
                        <span class="sector__ico"><x-icon :name="$sector['ico']" /></span>
                        <h3>{{ $sector['title'] }}</h3>
                        <p>{{ $sector['text'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="phases" data-reveal>
                <h3 class="phases__title">Le deroule d'une affaire tertiaire</h3>
                <ol class="phases__list">
                    <li><span>Releve</span> Etat des lieux sur site, mesures de debits et analyse de l'existant</li>
                    <li><span>Etude</span> Note de calcul, schema de principe et chiffrage detaille par lot</li>
                    <li><span>Travaux</span> Planning coordonne avec les autres corps d'etat, en site occupe si necessaire</li>
                    <li><span>Reception</span> Mise en service, proces-verbal de reglage et formation de l'exploitant</li>
                    <li><span>Exploitation</span> Contrat de maintenance preventive et suivi des performances</li>
                </ol>
            </div>
        </div>
    </section>

    @include('services.partials.body')

@endsection
