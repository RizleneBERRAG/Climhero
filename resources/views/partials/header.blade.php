@php
    $contact = config('climhero.contact');
    $services = config('services_catalog');
@endphp

<div class="topbar">
    <div class="shell topbar__inner">
        <ul class="topbar__list">
            <li>
                <x-icon name="shield" />
                <span>Certifie RGE QualiPAC et QualiPV</span>
            </li>
            <li>
                <x-icon name="pin" />
                <span>{{ $contact['city'] }}, Nord-Isere et Est lyonnais</span>
            </li>
            <li>
                <x-icon name="clock" />
                <span>{{ $contact['hours'] }}</span>
            </li>
        </ul>
        <ul class="topbar__list">
            <li>
                <span class="dot-live" aria-hidden="true"></span>
                <span>Devis gratuit sous 48h</span>
            </li>
        </ul>
    </div>
</div>

<header class="site-header" data-header>
    <div class="shell site-header__inner">
        <a class="brand" href="{{ route('home') }}" aria-label="Climhero, retour a l'accueil">
            <span class="brand__mark"><x-logo /></span>
            <span class="brand__text">
                <span class="brand__name">Climhero</span>
                <span class="brand__tag">Genie climatique</span>
            </span>
        </a>

        <nav class="nav" aria-label="Navigation principale">
            <div class="nav__item">
                <a class="nav__link {{ climhero_is_route('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Accueil</a>
            </div>

            <div class="nav__item" data-dropdown>
                <a class="nav__link {{ climhero_is_route('service') ? 'is-active' : '' }}" href="#" aria-expanded="false" aria-haspopup="true">
                    Nos prestations
                    <x-icon name="chevron-down" class="nav__caret" />
                </a>
                <div class="nav__drop">
                    @foreach ($services as $service)
                        <a class="nav__drop-link" data-accent="{{ $service['accent'] }}" href="{{ route('service', $service['slug']) }}">
                            <span class="nav__drop-ico"><x-icon :name="$service['icon']" /></span>
                            <span>
                                <span class="nav__drop-title">{{ $service['title'] }}</span>
                                <span class="nav__drop-text">{{ $service['baseline'] }}</span>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="nav__item">
                <a class="nav__link" href="{{ route('home') }}#aides">Aides de l'Etat</a>
            </div>

            <div class="nav__item">
                <a class="nav__link" href="{{ route('home') }}#zone">Zone d'intervention</a>
            </div>

            <div class="nav__item">
                <a class="nav__link {{ climhero_is_route('contact') ? 'is-active' : '' }}" href="{{ route('contact') }}">Contact</a>
            </div>
        </nav>

        <div class="header__actions">
            <a class="header__phone" href="tel:{{ $contact['phone_link'] }}">
                <x-icon name="phone" />
                {{ $contact['phone'] }}
            </a>
            <a class="btn btn--primary btn--sm" href="{{ route('contact') }}">
                Devis gratuit
                <x-icon name="arrow-right" class="ico" />
            </a>
            <button class="burger" type="button" data-burger aria-label="Ouvrir le menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div class="mobile-nav" data-mobile-nav>
    <a class="mobile-nav__link" href="{{ route('home') }}">Accueil</a>
    <div class="mobile-nav__link" style="border-bottom:none;padding-bottom:4px;">Nos prestations</div>
    <div class="mobile-nav__sub">
        @foreach ($services as $service)
            <a href="{{ route('service', $service['slug']) }}">{{ $service['title'] }}</a>
        @endforeach
    </div>
    <a class="mobile-nav__link" href="{{ route('home') }}#aides">Aides de l'Etat</a>
    <a class="mobile-nav__link" href="{{ route('home') }}#zone">Zone d'intervention</a>
    <a class="mobile-nav__link" href="{{ route('contact') }}">Contact</a>

    <div class="mobile-nav__cta">
        <a class="btn btn--primary btn--block" href="{{ route('contact') }}">Demander un devis gratuit</a>
        <a class="btn btn--ghost btn--block" href="tel:{{ $contact['phone_link'] }}">
            <x-icon name="phone" class="ico" />
            {{ $contact['phone'] }}
        </a>
    </div>
</div>
