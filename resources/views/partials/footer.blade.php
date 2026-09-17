@php
    $brand = config('climhero.brand');
    $contact = config('climhero.contact');
    $services = config('services_catalog');
    $zones = config('climhero.zones');
@endphp

<footer class="site-footer">
    <div class="shell">
        <div class="footer__grid">
            <div>
                <a class="brand" href="{{ route('home') }}">
                    <span class="brand__mark"><x-logo /></span>
                    <span class="brand__text">
                        <span class="brand__name">Climhero</span>
                        <span class="brand__tag">Genie climatique</span>
                    </span>
                </a>
                <p class="footer__about">
                    {{ $brand['experience_years'] }} ans de genie climatique au service des particuliers et des professionnels.
                    Pompes a chaleur, climatisation, photovoltaique et froid commercial, poses par nos techniciens salaries.
                </p>
                <div class="footer__socials">
                    <a href="{{ $contact['facebook'] }}" target="_blank" rel="noopener" aria-label="Facebook"><x-icon name="facebook" /></a>
                    <a href="{{ $contact['maps_url'] }}" target="_blank" rel="noopener" aria-label="Google Maps"><x-icon name="pin" /></a>
                    <a href="mailto:{{ $contact['email'] }}" aria-label="Envoyer un email"><x-icon name="mail" /></a>
                </div>
            </div>

            <div>
                <h2 class="footer__title">Prestations</h2>
                <ul class="footer__list">
                    @foreach ($services as $service)
                        <li><a href="{{ route('service', $service['slug']) }}">{{ $service['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="footer__title">L'entreprise</h2>
                <ul class="footer__list">
                    <li><a href="{{ route('home') }}#preuves">Nos certifications</a></li>
                    <li><a href="{{ route('home') }}#methode">Notre methode</a></li>
                    <li><a href="{{ route('home') }}#aides">Simulateur d'aides</a></li>
                    <li><a href="{{ route('home') }}#avis">Avis clients</a></li>
                    <li><a href="{{ route('home') }}#faq">Questions frequentes</a></li>
                    <li><a href="{{ route('contact') }}">Demander un devis</a></li>
                </ul>
            </div>

            <div>
                <h2 class="footer__title">Nous joindre</h2>
                <ul class="footer__contact">
                    <li>
                        <x-icon name="pin" />
                        <span>{{ $contact['street'] }}<br>{{ $contact['postal_code'] }} {{ $contact['city'] }}</span>
                    </li>
                    <li>
                        <x-icon name="phone" />
                        <a href="tel:{{ $contact['phone_link'] }}">{{ $contact['phone'] }}</a>
                    </li>
                    <li>
                        <x-icon name="mail" />
                        <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                    </li>
                    <li>
                        <x-icon name="clock" />
                        <span>{{ $contact['hours'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer__cities">
            <div class="footer__cities-links">
                <strong>Nos pages locales :</strong>
                @foreach (config('cities') as $citySlug => $cityData)
                    <a href="{{ route('city', $citySlug) }}">{{ $cityData['name'] }}</a>
                @endforeach
            </div>
            @foreach ($zones as $zone)
                <div><strong>{{ $zone['name'] }} :</strong> {{ implode(', ', $zone['cities']) }}</div>
            @endforeach
        </div>

        <div class="footer__bottom">
            <div>&copy; <span data-year>{{ date('Y') }}</span> {{ $brand['legal_name'] }}. Tous droits reserves.</div>
            <div class="footer__legal">
                <a href="{{ route('legal.mentions') }}">Mentions legales</a>
                <a href="{{ route('legal.privacy') }}">Politique de confidentialite</a>
                <a href="{{ route('sitemap') }}">Plan du site</a>
            </div>
        </div>
    </div>
</footer>
