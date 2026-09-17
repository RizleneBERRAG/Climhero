@extends('layouts.app', [
    'pageCss' => 'home',
    'pageJs' => 'home',
    'bodyClass' => 'page-home',
])

@php
    $brand = config('climhero.brand');
    $contact = config('climhero.contact');
    $services = config('services_catalog');
    $stats = config('climhero.stats');
    $certifications = config('climhero.certifications');
    $brands = config('climhero.brands');
    $process = config('climhero.process');
    $zones = config('climhero.zones');
    $reviews = config('climhero.reviews');
    $faq = config('climhero.faq');
    $aides = config('aides');
@endphp

@push('schema')
    <script type="application/ld+json">@json(climhero_faq_schema($faq), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')

    {{-- ==================================================================
         HERO
         ================================================================== --}}
    <section class="hero">
        {{-- La photo de chantier occupe tout le hero ; les voiles assurent la lisibilite. --}}
        <div class="hero__bg" aria-hidden="true">
            <picture>
                <source media="(max-width: 760px)" srcset="{{ climhero_asset('images/site/hero-large-mobile.webp') }}">
                <img src="{{ climhero_asset('images/site/hero-large.webp') }}"
                     alt="" width="1920" height="900" fetchpriority="high" decoding="async">
            </picture>
            <span class="hero__scrim"></span>
            <span class="hero__grain"></span>
        </div>

        <div class="shell hero__inner">
            <div class="hero__content">
                <span class="chip chip--light hero__chip">
                    <span class="dot-live" aria-hidden="true"></span>
                    {{ $brand['experience_years'] }} ans de genie climatique en Nord-Isere
                </span>

                <h1 class="hero__title">
                    Le confort thermique,<br>
                    <span class="grad-text grad-text--cool">sans mauvaise</span>
                    <span class="grad-text grad-text--warm">surprise</span>
                </h1>

                <p class="hero__lede">
                    Pompe a chaleur, climatisation reversible, photovoltaique et froid commercial.
                    Nous etudions, installons et entretenons votre installation avec nos propres techniciens,
                    de Charvieu-Chavagneux a Lyon.
                </p>

                <div class="hero__actions">
                    <a class="btn btn--primary btn--lg" href="{{ route('contact') }}">
                        Obtenir mon devis gratuit
                        <x-icon name="arrow-right" class="ico" />
                    </a>
                    <a class="btn btn--ghost-light btn--lg" href="#aides">
                        <x-icon name="euro" class="ico" />
                        Estimer mes aides
                    </a>
                </div>
            </div>

            {{-- Le thermostat reste dans le hero : il montre en un geste ce que fait une PAC. --}}
            <div class="hero__thermo" data-reveal>
                <div class="thermo" data-thermo>
                    <div class="thermo__row">
                        <div class="thermo__gauge">
                            <svg viewBox="0 0 220 220" class="thermo__ring" aria-hidden="true">
                                <circle cx="110" cy="110" r="94" class="thermo__track" />
                                <circle cx="110" cy="110" r="94" class="thermo__progress" data-thermo-ring />
                            </svg>
                            <span class="thermo__value">
                                <span data-thermo-temp>21</span><sup>&deg;</sup>
                            </span>
                        </div>

                        <div class="thermo__readout">
                            <span class="thermo__mode" data-thermo-mode>Mode chauffage</span>
                            <small data-thermo-label>Temperature de confort en hiver</small>
                        </div>
                    </div>

                    <div class="thermo__toggle" role="group" aria-label="Basculer entre chauffage et rafraichissement">
                        <button type="button" class="thermo__btn is-active" data-thermo-set="heat">
                            <x-icon name="flame" /> <span>Chauffer</span>
                        </button>
                        <button type="button" class="thermo__btn" data-thermo-set="cool">
                            <x-icon name="snowflake" /> <span>Rafraichir</span>
                        </button>
                    </div>

                    <div class="thermo__meta">
                        <div>
                            <span class="thermo__meta-value" data-thermo-cop>4,6</span>
                            <span class="thermo__meta-label">COP moyen constate</span>
                        </div>
                        <div>
                            <span class="thermo__meta-value" data-thermo-save>-62 %</span>
                            <span class="thermo__meta-label">sur la facture annuelle</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bandeau de preuves pose sur le bas de la photo. --}}
        <div class="hero__proof">
            <div class="shell hero__proof-inner" data-reveal-group>
                <div class="hero__proof-item" data-reveal>
                    <x-icon name="shield" />
                    <span><strong>RGE QualiPAC et QualiPV</strong>Vos aides de l'Etat securisees</span>
                </div>
                <div class="hero__proof-item" data-reveal>
                    <x-icon name="users" />
                    <span><strong>Techniciens salaries</strong>Aucune sous-traitance</span>
                </div>
                <div class="hero__proof-item" data-reveal>
                    <x-icon name="clock" />
                    <span><strong>Devis sous 48h</strong>Apres une visite technique gratuite</span>
                </div>
                <div class="hero__proof-item" data-reveal>
                    <x-icon name="pin" />
                    <span><strong>Nord-Isere et Est lyonnais</strong>Depannage en moins d'une heure</span>
                </div>
            </div>
        </div>

        <div class="hero__marquee">
            <div class="shell">
                <span class="hero__marquee-label">Nous installons et depannons</span>
            </div>
            <div class="marquee">
                <div class="marquee__track">
                    @foreach (array_merge($brands, $brands) as $b)
                        <span class="marquee__item">{{ $b }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ==================================================================
         PREUVES
         ================================================================== --}}
    <section class="section section--tight" id="preuves">
        <div class="shell">
            <div class="proof" data-reveal-group>
                @foreach ($stats as $stat)
                    <div class="proof__item" data-reveal>
                        <span class="proof__value">
                            <span data-count="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</span>
                        </span>
                        <span class="proof__label">{{ $stat['label'] }}</span>
                    </div>
                @endforeach
            </div>

            <div class="badges badges--center" data-reveal-group>
                @foreach ($certifications as $cert)
                    <div class="badge" data-reveal>
                        <span class="badge__seal">
                            @if (($cert['logo'] ?? null) && is_file(public_path($cert['logo'])))
                                <img src="{{ climhero_asset($cert['logo']) }}" alt="" loading="lazy" decoding="async">
                            @else
                                <x-icon name="shield" />
                            @endif
                        </span>
                        <span>
                            <span class="badge__label">{{ $cert['label'] }}</span>
                            <span class="badge__detail">{{ $cert['detail'] }}</span>
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================================================================
         PRESTATIONS
         ================================================================== --}}
    <section class="section section--mist" id="prestations">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Nos prestations</span>
                <h2 class="h-lg">Six metiers, une seule equipe, un seul interlocuteur</h2>
                <p class="lede">
                    Du remplacement d'une chaudiere fioul a la maintenance d'une chambre froide, nous couvrons
                    l'ensemble de la chaine thermique du batiment. Choisissez votre besoin.
                </p>
            </div>

            <div class="svc-grid" data-reveal-group>
                @foreach ($services as $service)
                    <a class="svc" data-accent="{{ $service['accent'] }}" href="{{ route('service', $service['slug']) }}" data-reveal>
                        <span class="svc__glow" aria-hidden="true"></span>
                        <span class="svc__media">
                            <figure class="media media--card" data-accent="{{ $service['accent'] }}">
                                @if (($service['photo'] ?? null) && is_file(public_path($service['photo'])))
                                    <img src="{{ climhero_asset($service['photo']) }}" alt="{{ $service['photo_alt'] ?? $service['title'] }}" loading="lazy" decoding="async">
                                @else
                                    <x-scene :name="$service['accent']" />
                                @endif
                            </figure>
                            <span class="svc__ico"><x-icon :name="$service['icon']" /></span>
                        </span>
                        <h3 class="svc__title">{{ $service['title'] }}</h3>
                        <p class="svc__text">{{ $service['baseline'] }}</p>
                        <ul class="svc__list">
                            @foreach (array_slice($service['solutions'], 0, 3) as $sol)
                                <li><x-icon name="check" /> {{ $sol['title'] }}</li>
                            @endforeach
                        </ul>
                        <span class="svc__cta">
                            Voir la prestation
                            <x-icon name="arrow-right" />
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================================================================
         REALISATIONS
         ================================================================== --}}
    @php
        $gallery = [
            ['src' => 'images/site/hero-technicien.webp', 'alt' => 'Technicien Climhero en intervention sur un groupe exterieur', 'label' => 'Mise en service et depannage', 'place' => 'Charvieu-Chavagneux', 'size' => 'lg'],
            ['src' => 'images/services/pompe-a-chaleur.webp', 'alt' => 'Pompe a chaleur air/eau installee en facade', 'label' => 'Pompe a chaleur air/eau', 'place' => 'Meyzieu', 'size' => 'sm'],
            ['src' => 'images/services/climatisation.webp', 'alt' => 'Entretien d une unite interieure de climatisation reversible', 'label' => 'Climatisation reversible', 'place' => 'Lyon 3e', 'size' => 'sm'],
            ['src' => 'images/services/photovoltaique.webp', 'alt' => 'Panneaux photovoltaiques poses en toiture', 'label' => 'Photovoltaique en toiture', 'place' => 'Saint-Priest', 'size' => 'sm'],
            ['src' => 'images/services/froid-commercial.webp', 'alt' => 'Chambre froide inox equipee par Climhero', 'label' => 'Chambre froide', 'place' => 'Bourgoin-Jallieu', 'size' => 'sm'],
            ['src' => 'images/services/genie-climatique.webp', 'alt' => 'Reseau aeraulique en plafond technique', 'label' => 'Genie climatique tertiaire', 'place' => 'Est lyonnais', 'size' => 'sm'],
        ];
    @endphp

    <section class="section gal-section" id="realisations">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Nos realisations</span>
                <h2 class="h-lg">Des chantiers, pas des images de catalogue</h2>
                <p class="lede">
                    Maisons individuelles, appartements, commerces et locaux tertiaires : un apercu de ce que
                    nos equipes posent et mettent en service chaque semaine en Nord-Isere et dans l'Est lyonnais.
                </p>
            </div>

            <div class="gal" data-reveal-group>
                @foreach ($gallery as $shot)
                    @if (is_file(public_path($shot['src'])))
                        <figure class="gal__item gal__item--{{ $shot['size'] }}" data-reveal>
                            <img src="{{ climhero_asset($shot['src']) }}" alt="{{ $shot['alt'] }}" loading="lazy" decoding="async">
                            <figcaption>
                                <strong>{{ $shot['label'] }}</strong>
                                <span><x-icon name="pin" /> {{ $shot['place'] }}</span>
                            </figcaption>
                        </figure>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================================================================
         SIMULATEUR D'AIDES
         ================================================================== --}}
    <section class="section section--dark simu" id="aides">
        <div class="shell">
            <div class="section-head section-head--center">
                <span class="eyebrow">Aides de l'Etat</span>
                <h2 class="h-lg">Combien l'Etat paie-t-il a votre place ?</h2>
                <p class="lede">
                    MaPrimeRenov, primes CEE, TVA reduite. Repondez a quatre questions et obtenez une estimation
                    immediate de votre reste a charge. Nous montons ensuite les dossiers a votre place.
                </p>
            </div>

            <div class="simu__card" data-simulateur>
                <div class="simu__form">
                    <div class="simu__field">
                        <span class="simu__label">1. Quel equipement vous interesse ?</span>
                        <div class="simu__options simu__options--equip">
                            @foreach ($aides['equipements'] as $key => $equip)
                                <label class="simu__opt">
                                    <input type="radio" name="equipement" value="{{ $key }}" @checked($loop->first)>
                                    <span>{{ $equip['label'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="simu__field">
                        <span class="simu__label">2. Quel est votre chauffage actuel ?</span>
                        <div class="simu__options">
                            @foreach ($aides['chauffage_actuel'] as $key => $label)
                                <label class="simu__opt">
                                    <input type="radio" name="chauffage" value="{{ $key }}" @checked($loop->first)>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="simu__field">
                        <span class="simu__label">3. Dans quelle tranche de revenus situez-vous votre foyer ?</span>
                        <div class="simu__options">
                            @foreach ($aides['profils'] as $key => $label)
                                <label class="simu__opt">
                                    <input type="radio" name="profil" value="{{ $key }}" @checked($key === 'intermediaire')>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        <span class="simu__hint">
                            Les tranches sont definies par l'Anah selon le revenu fiscal de reference et le nombre
                            de personnes du foyer. En cas de doute, choisissez la tranche intermediaire.
                        </span>
                    </div>
                </div>

                <aside class="simu__result" aria-live="polite">
                    <span class="simu__result-title">Votre estimation</span>

                    <div class="simu__amount">
                        <span data-simu-total>0</span>
                        <span class="simu__amount-unit">euros d'aides</span>
                    </div>

                    <ul class="simu__detail">
                        <li>
                            <span>MaPrimeRenov</span>
                            <strong data-simu-mpr>0 euros</strong>
                        </li>
                        <li>
                            <span>Prime CEE</span>
                            <strong data-simu-cee>0 euros</strong>
                        </li>
                        <li>
                            <span>Bonus depose ancien systeme</span>
                            <strong data-simu-bonus>0 euros</strong>
                        </li>
                        <li>
                            <span>TVA appliquee</span>
                            <strong data-simu-tva>5,5 %</strong>
                        </li>
                    </ul>

                    <div class="simu__rac">
                        <span>Reste a charge estime</span>
                        <strong data-simu-rac>0 euros</strong>
                    </div>

                    <p class="simu__eco" data-simu-eco></p>

                    <a class="btn btn--primary btn--block" href="{{ route('contact') }}" data-simu-link>
                        Faire chiffrer mon projet
                        <x-icon name="arrow-right" class="ico" />
                    </a>

                    <p class="simu__disclaimer">{{ $aides['disclaimer'] }}</p>
                </aside>
            </div>

        </div>
    </section>

    {{-- ==================================================================
         METHODE
         ================================================================== --}}
    <section class="section" id="methode">
        <div class="shell">
            <div class="section-head">
                <span class="eyebrow">Notre methode</span>
                <h2 class="h-lg">Cinq etapes, aucune zone d'ombre</h2>
                <p class="lede">
                    Le probleme du secteur, ce n'est pas le materiel, c'est le flou. Voici exactement comment
                    se deroule un chantier chez nous, du premier appel au contrat d'entretien.
                </p>
            </div>

            <ol class="steps" data-reveal-group>
                @foreach ($process as $item)
                    <li class="step" data-reveal>
                        <span class="step__num">{{ $item['step'] }}</span>
                        <div class="step__body">
                            <h3 class="step__title">{{ $item['title'] }}</h3>
                            <p class="step__text">{{ $item['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- ==================================================================
         DIFFERENCIATEURS
         ================================================================== --}}
    <section class="section section--mist">
        <div class="shell">
            <div class="why">
                <div class="why__intro" data-reveal>
                    <span class="eyebrow">Pourquoi Climhero</span>
                    <h2 class="h-lg">Ce qui change concretement pour vous</h2>
                    <p class="lede">
                        Nous sommes une entreprise locale, pas une plateforme de mise en relation.
                        Le technicien qui vient chez vous est salarie de l'entreprise, et c'est lui que
                        vous reverrez a l'entretien.
                    </p>
                    <a class="link-arrow" href="{{ route('contact') }}">
                        Parler a un technicien
                        <x-icon name="arrow-right" />
                    </a>
                </div>

                <div class="why__grid" data-reveal-group>
                    <article class="why__card" data-reveal>
                        <span class="why__ico why__ico--cool"><x-icon name="shield" /></span>
                        <h3>Certifications RGE reelles</h3>
                        <p>QualiPAC, QualiPV, attestation fluides et decennale a jour. Sans RGE, pas d'aides : notre certification conditionne votre financement.</p>
                    </article>
                    <article class="why__card" data-reveal>
                        <span class="why__ico why__ico--warm"><x-icon name="users" /></span>
                        <h3>Aucune sous-traitance</h3>
                        <p>Nos techniciens sont salaries et formes en interne. Le chantier n'est pas revendu a une equipe que vous ne connaissez pas.</p>
                    </article>
                    <article class="why__card" data-reveal>
                        <span class="why__ico why__ico--sun"><x-icon name="euro" /></span>
                        <h3>Aides montees par nos soins</h3>
                        <p>Nous constituons les dossiers MaPrimeRenov et CEE, suivons l'instruction et deduisons les montants du devis.</p>
                    </article>
                    <article class="why__card" data-reveal>
                        <span class="why__ico why__ico--leaf"><x-icon name="wrench" /></span>
                        <h3>Un SAV qui repond</h3>
                        <p>Contrat d'entretien annuel, priorite d'intervention et delai moyen de 48h sur notre zone, y compris sur du materiel pose par d'autres.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================================================================
         ZONE D'INTERVENTION
         ================================================================== --}}
    <section class="section zone" id="zone">
        <div class="shell">
            <div class="zone__inner">
                <div class="zone__text" data-reveal>
                    <span class="eyebrow">Zone d'intervention</span>
                    <h2 class="h-lg">A moins de 40 minutes de chez vous</h2>
                    <p class="lede">
                        Notre atelier est base a {{ $contact['city'] }}, entre l'A43 et l'A432. Cette position
                        nous permet de couvrir le Nord-Isere, l'Est lyonnais, Lyon et le sud de l'Ain avec des
                        delais d'intervention courts, sans facturer des heures de route.
                    </p>

                    <div class="zone__tabs" data-tabs>
                        <div class="zone__tablist" role="tablist">
                            @foreach ($zones as $zone)
                                <button type="button" class="zone__tab {{ $loop->first ? 'is-active' : '' }}"
                                        data-tab="zone-{{ $loop->index }}" role="tab"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $zone['name'] }}
                                </button>
                            @endforeach
                        </div>

                        @foreach ($zones as $zone)
                            <div class="zone__panel {{ $loop->first ? 'is-active' : '' }}" data-panel="zone-{{ $loop->index }}">
                                <ul class="zone__cities">
                                    @foreach ($zone['cities'] as $city)
                                        <li><x-icon name="pin" /> {{ $city }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>

                    <p class="zone__note">
                        Votre commune n'apparait pas ? Appelez-nous, nous sortons regulierement de cette zone
                        pour les chantiers de genie climatique et le froid commercial.
                    </p>
                </div>

                <div class="zone__map" data-reveal aria-hidden="true">
                    <div class="zone__radar">
                        <span class="zone__ping"></span>
                        <span class="zone__ping zone__ping--2"></span>
                        <span class="zone__ping zone__ping--3"></span>
                        <span class="zone__center">
                            <x-icon name="home" />
                        </span>
                        @foreach (['Lyon' => [19, 63], 'Villeurbanne' => [28, 44], 'Meyzieu' => [66, 37], 'Bourgoin-Jallieu' => [76, 73], 'Cremieu' => [70, 18], 'Beynost' => [43, 14], 'Saint-Priest' => [33, 78]] as $city => $pos)
                            <span class="zone__dot" style="left:{{ $pos[0] }}%;top:{{ $pos[1] }}%">
                                <i></i>
                                <em>{{ $city }}</em>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================================================================
         AVIS
         ================================================================== --}}
    <section class="section section--mist" id="avis">
        <div class="shell">
            <div class="section-head section-head--center">
                <span class="eyebrow">Avis clients</span>
                <h2 class="h-lg">Ce que disent les chantiers termines</h2>
                <p class="lede">
                    Particuliers et professionnels, sur des projets de remplacement de chaudiere,
                    de climatisation et de froid commercial.
                </p>
            </div>

            <div class="reviews" data-reveal-group>
                @foreach ($reviews as $review)
                    <figure class="review" data-reveal>
                        <div class="review__stars" aria-label="{{ $review['rating'] }} etoiles sur 5">
                            @for ($i = 0; $i < $review['rating']; $i++)
                                <x-icon name="star" />
                            @endfor
                        </div>
                        <blockquote class="review__text">{{ $review['text'] }}</blockquote>
                        <figcaption class="review__meta">
                            <span class="review__avatar">{{ mb_substr($review['name'], 0, 1) }}</span>
                            <span>
                                <strong>{{ $review['name'] }}</strong>
                                <em>{{ $review['job'] }}, {{ $review['city'] }}</em>
                            </span>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================================================================
         FAQ
         ================================================================== --}}
    <section class="section" id="faq">
        <div class="shell faq-layout">
            <div class="faq-layout__head" data-reveal>
                <span class="eyebrow">Questions frequentes</span>
                <h2 class="h-lg">Les reponses avant l'appel</h2>
                <p class="lede">
                    Les six questions qui reviennent a chaque premier rendez-vous.
                    Si la votre n'y est pas, posez-la nous directement.
                </p>
                <a class="btn btn--ghost" href="{{ route('contact') }}">
                    Poser ma question
                    <x-icon name="arrow-right" class="ico" />
                </a>
            </div>

            <div class="faq-list" data-accordion data-accordion-single data-reveal-group>
                @foreach ($faq as $item)
                    <div class="faq-item {{ $loop->first ? 'is-open' : '' }}" data-reveal>
                        <button class="faq-item__q" type="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $item['q'] }}
                            <span class="faq-item__sign"><x-icon name="plus" /></span>
                        </button>
                        <div class="faq-item__a">
                            <div><p>{{ $item['a'] }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    @php
        $simuPayload = $aides;
        foreach ($simuPayload['equipements'] as $key => $equip) {
            $simuPayload['equipements'][$key]['url'] = route('contact', ['projet' => $key]);
            $simuPayload['equipements'][$key]['page'] = route('service', $equip['service']);
        }
    @endphp
    <script id="aides-data" type="application/json">@json($simuPayload, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)</script>
@endpush
