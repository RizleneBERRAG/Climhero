@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($service['faq']), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    @include('services.partials.hero')

    {{-- Section propre au chauffage : comparatif avant / apres --}}
    <section class="section svc-extra">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Avant et apres</span>
                <h2 class="h-lg">Ce que change le remplacement d'une chaudiere</h2>
                <p class="lede">
                    Ordre de grandeur pour une maison de 120 m2 correctement isolee en region lyonnaise,
                    chauffee au fioul, avec un besoin annuel d'environ 15 000 kWh.
                </p>
            </div>

            <div class="compare" data-reveal-group>
                <article class="compare__col compare__col--before" data-reveal>
                    <span class="compare__tag">Avant</span>
                    <h3>Chaudiere fioul de 2005</h3>
                    <ul>
                        <li><x-icon name="alert" /> Environ 1 800 litres de fioul par an</li>
                        <li><x-icon name="alert" /> Un budget annuel tres expose au cours du petrole</li>
                        <li><x-icon name="alert" /> Une cuve qui occupe le garage ou le jardin</li>
                        <li><x-icon name="alert" /> Un rendement qui se degrade chaque annee</li>
                        <li><x-icon name="alert" /> Une interdiction progressive en renovation</li>
                    </ul>
                </article>

                <div class="compare__arrow" aria-hidden="true">
                    <x-icon name="arrow-right" />
                </div>

                <article class="compare__col compare__col--after" data-reveal>
                    <span class="compare__tag">Apres</span>
                    <h3>Pompe a chaleur air/eau</h3>
                    <ul>
                        <li><x-icon name="check-circle" /> Un coefficient de performance superieur a 4 sur la saison</li>
                        <li><x-icon name="check-circle" /> Une facture de chauffage divisee par deux a trois</li>
                        <li><x-icon name="check-circle" /> Cuve deposee et evacuee, espace libere</li>
                        <li><x-icon name="check-circle" /> Production d'eau chaude possible avec le meme appareil</li>
                        <li><x-icon name="check-circle" /> Un equipement eligible a MaPrimeRenov et aux CEE</li>
                    </ul>
                </article>
            </div>

            <div class="compare__note">
                <x-icon name="alert" />
                <p>
                    Une pompe a chaleur mal dimensionnee consomme davantage qu'une bonne chaudiere.
                    C'est pour cette raison que nous calculons systematiquement les deperditions du logement
                    avant de proposer une puissance, et que nous verifions la compatibilite de chaque emetteur.
                </p>
            </div>
        </div>
    </section>

    @include('services.partials.body')

@endsection
