@extends('layouts.app')

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($service['faq']), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    @include('services.partials.hero')

    {{-- Section propre a l'eau chaude : volume de ballon --}}
    <section class="section svc-extra">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Dimensionnement</span>
                <h2 class="h-lg">Quel volume de ballon pour votre foyer</h2>
                <p class="lede">
                    Un ballon sous-dimensionne, ce sont des douches froides. Un ballon surdimensionne, ce sont
                    des pertes thermiques payees toute l'annee. Voici nos reperes de dimensionnement.
                </p>
            </div>

            <div class="ecs-grid" data-reveal-group>
                @foreach ([
                    ['foyer' => '1 a 2 personnes', 'elec' => '100 a 150 litres', 'thermo' => '150 a 200 litres'],
                    ['foyer' => '3 a 4 personnes', 'elec' => '150 a 200 litres', 'thermo' => '200 a 250 litres'],
                    ['foyer' => '5 personnes', 'elec' => '200 a 250 litres', 'thermo' => '250 a 270 litres'],
                    ['foyer' => '6 personnes et plus', 'elec' => '250 a 300 litres', 'thermo' => '270 a 300 litres'],
                ] as $row)
                    <article class="ecs-card" data-reveal>
                        <span class="ecs-card__foyer"><x-icon name="users" /> {{ $row['foyer'] }}</span>
                        <div class="ecs-card__row">
                            <span>Ballon electrique</span>
                            <strong>{{ $row['elec'] }}</strong>
                        </div>
                        <div class="ecs-card__row ecs-card__row--hl">
                            <span>Chauffe-eau thermodynamique</span>
                            <strong>{{ $row['thermo'] }}</strong>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="ecs-note" data-reveal>
                <x-icon name="droplet" />
                <p>
                    Le thermodynamique demande un volume superieur parce que sa remontee en temperature est plus
                    lente qu'une resistance electrique. En contrepartie, il consomme environ trois fois moins.
                    Nous verifions aussi le local d'installation, le niveau sonore et l'evacuation des condensats.
                </p>
            </div>
        </div>
    </section>

    @include('services.partials.body')

@endsection
