@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($service['faq']), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    @include('services.partials.hero')

    {{-- Section propre au froid : urgence et metiers --}}
    <section class="section svc-extra">
        <div class="shell">
            <div class="urgence" data-reveal>
                <div class="urgence__text">
                    <span class="chip chip--warm">
                        <span class="dot-live" aria-hidden="true"></span>
                        Depannage frigorifique
                    </span>
                    <h2 class="h-md">Une installation en panne immobilise votre activite</h2>
                    <p>
                        Chambre froide qui ne descend plus, vitrine qui givre, groupe qui se met en securite :
                        chaque heure compte pour votre stock. Appelez-nous, nous priorisons les urgences froid
                        sur notre zone et nos clients sous contrat passent en tete de file.
                    </p>
                </div>
                <a class="btn btn--primary btn--lg" href="tel:{{ config('climhero.contact.phone_link') }}">
                    <x-icon name="phone" class="ico" />
                    {{ config('climhero.contact.phone') }}
                </a>
            </div>

            <div class="section-head" style="margin-top:clamp(48px,6vw,80px)">
                <span class="eyebrow">Metiers</span>
                <h2 class="h-lg">Les professionnels que nous equipons</h2>
            </div>

            <div class="trades" data-reveal-group>
                @foreach ([
                    ['title' => 'Restaurants et traiteurs', 'text' => 'Chambres froides positives et negatives, tables refrigerees, cellules de refroidissement rapide.'],
                    ['title' => 'Boulangeries et patisseries', 'text' => 'Chambres de pousse controlee, surgelation, vitrines et laboratoires climatises.'],
                    ['title' => 'Boucheries et poissonneries', 'text' => 'Salles de decoupe, vitrines a temperature stable et respect strict de la chaine du froid.'],
                    ['title' => 'Commerces alimentaires', 'text' => 'Meubles muraux, groupes a distance, regulation centralisee et suivi des consommations.'],
                    ['title' => 'Pharmacies et laboratoires', 'text' => 'Enceintes a temperature dirigee, alarmes et tracabilite des releves.'],
                    ['title' => 'Industrie agroalimentaire', 'text' => 'Locaux de process, tunnels de refroidissement et maintenance sous contrat.'],
                ] as $trade)
                    <article class="trade" data-reveal>
                        <x-icon name="check-circle" />
                        <div>
                            <strong>{{ $trade['title'] }}</strong>
                            <p>{{ $trade['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('services.partials.body')

@endsection
