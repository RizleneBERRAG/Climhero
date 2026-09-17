@php $contact = config('climhero.contact'); @endphp

<section class="svc-hero">
    <div class="svc-hero__bg" aria-hidden="true">
        <span class="svc-hero__blob"></span>
        <span class="svc-hero__grid"></span>
    </div>

    <div class="shell">
        <nav class="crumb" aria-label="Fil d'ariane">
            <a href="{{ route('home') }}">Accueil</a>
            <x-icon name="chevron-right" />
            <span>Nos prestations</span>
            <x-icon name="chevron-right" />
            <strong>{{ $service['title'] }}</strong>
        </nav>

        <div class="svc-hero__inner">
            <div>
                <span class="chip chip--light svc-hero__chip">
                    <x-icon :name="$service['icon']" />
                    {{ $service['title'] }}
                </span>

                <h1 class="svc-hero__title">{{ $service['h1'] }}</h1>
                <p class="svc-hero__baseline">{{ $service['baseline'] }}</p>

                <div class="svc-hero__actions">
                    <a class="btn btn--primary btn--lg" href="{{ route('contact', ['prestation' => $service['slug']]) }}">
                        Demander un devis gratuit
                        <x-icon name="arrow-right" class="ico" />
                    </a>
                    <a class="btn btn--ghost-light btn--lg" href="tel:{{ $contact['phone_link'] }}">
                        <x-icon name="phone" class="ico" />
                        {{ $contact['phone'] }}
                    </a>
                </div>
            </div>

            <div class="svc-hero__aside">
                @if (($service['photo'] ?? null) && is_file(public_path($service['photo'])))
                    <figure class="svc-hero__shot">
                        <img src="{{ climhero_asset($service['photo']) }}"
                             alt="{{ $service['photo_alt'] ?? $service['title'] }}"
                             width="640" height="427" fetchpriority="high" decoding="async">
                    </figure>
                @endif

                <ul class="svc-hero__facts">
                <li>
                    <x-icon name="shield" />
                    <span><strong>Certifie RGE</strong> QualiPAC et QualiPV</span>
                </li>
                <li>
                    <x-icon name="users" />
                    <span><strong>Techniciens salaries</strong>, aucune sous-traitance</span>
                </li>
                <li>
                    <x-icon name="clock" />
                    <span><strong>Devis sous 48h</strong> apres la visite technique</span>
                </li>
                <li>
                    <x-icon name="pin" />
                    <span><strong>Nord-Isere, Est lyonnais</strong> et agglomeration de Lyon</span>
                </li>
                </ul>
            </div>
        </div>
    </div>
</section>
