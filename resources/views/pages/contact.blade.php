@extends('layouts.app', [
    'pageCss' => 'contact',
    'pageJs' => 'contact',
    'bodyClass' => 'page-contact',
])

@php
    $contact = config('climhero.contact');
    $services = config('services_catalog');
    $chauffages = config('aides.chauffage_actuel');
@endphp

@section('content')

    <section class="contact-hero">
        <div class="shell contact-hero__inner">
            <div>
                <span class="chip chip--light">
                    <span class="dot-live" aria-hidden="true"></span>
                    Reponse sous 24h ouvrees
                </span>
                <h1 class="contact-hero__title">Un devis clair, chiffre, aides deduites</h1>
                <p class="contact-hero__lede">
                    Deux minutes de formulaire, puis un vrai echange avec un technicien.
                    Pas de centre d'appels, pas de revente de votre demande a trois entreprises.
                </p>
            </div>

            <ul class="contact-hero__points">
                <li><x-icon name="check-circle" /> Visite technique gratuite et sans engagement</li>
                <li><x-icon name="check-circle" /> Devis detaille sous 48h apres la visite</li>
                <li><x-icon name="check-circle" /> Montant des aides calcule avant signature</li>
                <li><x-icon name="check-circle" /> Vos donnees ne sont jamais revendues</li>
            </ul>
        </div>
    </section>

    <section class="section contact" id="formulaire">
        <div class="shell contact__grid">

            <div class="contact__form-wrap">
                @if (session('lead_sent'))
                    <div class="alert alert--success" role="status">
                        <x-icon name="check-circle" />
                        <div>
                            <strong>Votre demande est bien arrivee.</strong><br>
                            Un technicien vous rappelle sous 24h ouvrees. Si votre situation est urgente,
                            appelez directement le {{ $contact['phone'] }}.
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert--error" role="alert">
                        <x-icon name="alert" />
                        <div>
                            <strong>Le formulaire n'a pas pu etre envoye.</strong><br>
                            Merci de corriger les points signales ci-dessous.
                        </div>
                    </div>
                @endif

                <form class="qform" method="POST" action="{{ route('contact.store') }}" data-qform novalidate>
                    @csrf
                    <input type="hidden" name="page" value="{{ url()->current() }}">
                    <input type="hidden" name="started_at" value="" data-started-at>

                    <div class="honey" aria-hidden="true">
                        <label>Ne pas remplir ce champ
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </label>
                    </div>

                    <div class="qform__progress" data-qform-progress>
                        <div class="qform__bar"><span data-qform-bar></span></div>
                        <ol class="qform__steps">
                            <li class="is-active" data-qform-dot="1">Votre projet</li>
                            <li data-qform-dot="2">Votre logement</li>
                            <li data-qform-dot="3">Vos coordonnees</li>
                        </ol>
                    </div>

                    {{-- Etape 1 --------------------------------------------------- --}}
                    <fieldset class="qform__step is-active" data-qform-step="1">
                        <legend class="qform__legend">Quel est votre besoin ?</legend>

                        <div class="field">
                            <span class="field__label">Vous etes</span>
                            <div class="choice-grid">
                                @foreach (['particulier' => 'Un particulier', 'professionnel' => 'Un professionnel', 'bailleur' => 'Un bailleur'] as $value => $label)
                                    <label class="choice">
                                        <input type="radio" name="profile" value="{{ $value }}" @checked(old('profile', 'particulier') === $value)>
                                        <span class="choice__box" aria-hidden="true"></span>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                            @error('profile') <span class="field__error">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="service">Prestation concernee</label>
                            <select class="select" name="service" id="service">
                                <option value="">Je ne sais pas encore</option>
                                @foreach ($services as $item)
                                    <option value="{{ $item['slug'] }}" @selected(old('service', $preselect ?? null) === $item['slug'])>
                                        {{ $item['title'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service') <span class="field__error">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <span class="field__label">Type de demande</span>
                            <div class="choice-grid">
                                @foreach (['installation' => 'Installation neuve', 'remplacement' => 'Remplacement', 'depannage' => 'Depannage', 'entretien' => 'Entretien'] as $value => $label)
                                    <label class="choice">
                                        <input type="radio" name="project_type" value="{{ $value }}" @checked(old('project_type') === $value)>
                                        <span class="choice__box" aria-hidden="true"></span>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="qform__nav">
                            <button type="button" class="btn btn--primary" data-qform-next>
                                Continuer
                                <x-icon name="arrow-right" class="ico" />
                            </button>
                        </div>
                    </fieldset>

                    {{-- Etape 2 --------------------------------------------------- --}}
                    <fieldset class="qform__step" data-qform-step="2">
                        <legend class="qform__legend">Parlez-nous du logement</legend>

                        <div class="field">
                            <span class="field__label">Type de bien</span>
                            <div class="choice-grid">
                                @foreach (['maison' => 'Maison', 'appartement' => 'Appartement', 'local' => 'Local professionnel'] as $value => $label)
                                    <label class="choice">
                                        <input type="radio" name="housing_type" value="{{ $value }}" @checked(old('housing_type') === $value)>
                                        <span class="choice__box" aria-hidden="true"></span>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="field">
                            <label class="field__label" for="current_heating">Chauffage actuel</label>
                            <select class="select" name="current_heating" id="current_heating">
                                <option value="">Non precise</option>
                                @foreach ($chauffages as $value => $label)
                                    <option value="{{ $value }}" @selected(old('current_heating') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="field">
                            <span class="field__label">Echeance envisagee</span>
                            <div class="choice-grid">
                                @foreach (['urgent' => 'Urgent', 'trois_mois' => 'Sous 3 mois', 'six_mois' => 'Sous 6 mois', 'information' => 'Je me renseigne'] as $value => $label)
                                    <label class="choice">
                                        <input type="radio" name="deadline" value="{{ $value }}" @checked(old('deadline') === $value)>
                                        <span class="choice__box" aria-hidden="true"></span>
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="qform__nav">
                            <button type="button" class="btn btn--ghost" data-qform-prev>Retour</button>
                            <button type="button" class="btn btn--primary" data-qform-next>
                                Continuer
                                <x-icon name="arrow-right" class="ico" />
                            </button>
                        </div>
                    </fieldset>

                    {{-- Etape 3 --------------------------------------------------- --}}
                    <fieldset class="qform__step" data-qform-step="3">
                        <legend class="qform__legend">Comment vous joindre ?</legend>

                        <div class="qform__row">
                            <div class="field @error('first_name') field--error @enderror">
                                <label class="field__label" for="first_name">Prenom</label>
                                <input class="input" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" autocomplete="given-name" required>
                                @error('first_name') <span class="field__error">{{ $message }}</span> @enderror
                            </div>

                            <div class="field @error('last_name') field--error @enderror">
                                <label class="field__label" for="last_name">Nom</label>
                                <input class="input" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="family-name" required>
                                @error('last_name') <span class="field__error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="qform__row">
                            <div class="field @error('email') field--error @enderror">
                                <label class="field__label" for="email">Email</label>
                                <input class="input" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
                                @error('email') <span class="field__error">{{ $message }}</span> @enderror
                            </div>

                            <div class="field @error('phone') field--error @enderror">
                                <label class="field__label" for="phone">Telephone</label>
                                <input class="input" type="tel" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" placeholder="06 12 34 56 78" required>
                                @error('phone') <span class="field__error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="qform__row">
                            <div class="field @error('postal_code') field--error @enderror">
                                <label class="field__label" for="postal_code">Code postal du chantier</label>
                                <input class="input" type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" inputmode="numeric" maxlength="5" placeholder="38510" required>
                                @error('postal_code') <span class="field__error">{{ $message }}</span> @enderror
                            </div>

                            <div class="field">
                                <label class="field__label" for="city">Commune</label>
                                <input class="input" type="text" id="city" name="city" value="{{ old('city') }}" autocomplete="address-level2">
                            </div>
                        </div>

                        <div class="field @error('message') field--error @enderror">
                            <label class="field__label" for="message">Decrivez votre projet</label>
                            <textarea class="textarea" id="message" name="message" placeholder="Surface a chauffer, nombre de pieces, equipement actuel, contraintes d'acces, tout ce qui peut nous aider a chiffrer juste.">{{ old('message') }}</textarea>
                            <span class="field__hint">Plus vous etes precis, plus notre premiere estimation sera fiable.</span>
                            @error('message') <span class="field__error">{{ $message }}</span> @enderror
                        </div>

                        <label class="consent @error('consent') field--error @enderror">
                            <input type="checkbox" name="consent" value="1" @checked(old('consent')) required>
                            <span>
                                J'accepte que Climhero utilise ces informations pour me recontacter au sujet de ma demande.
                                Elles ne sont ni revendues ni transmises a des tiers.
                                <a href="{{ route('legal.privacy') }}">Politique de confidentialite</a>.
                            </span>
                        </label>
                        @error('consent') <span class="field__error">{{ $message }}</span> @enderror

                        <div class="qform__nav">
                            <button type="button" class="btn btn--ghost" data-qform-prev>Retour</button>
                            <button type="submit" class="btn btn--primary btn--lg">
                                Envoyer ma demande
                                <x-icon name="arrow-right" class="ico" />
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <aside class="contact__aside">
                <div class="contact__card">
                    <h2 class="h-sm">Vous preferez appeler ?</h2>
                    <a class="contact__phone" href="tel:{{ $contact['phone_link'] }}">
                        <x-icon name="phone" />
                        {{ $contact['phone'] }}
                    </a>
                    <p class="contact__hours">{{ $contact['hours'] }}</p>
                    <a class="btn btn--ghost btn--block" href="mailto:{{ $contact['email'] }}">
                        <x-icon name="mail" class="ico" />
                        {{ $contact['email'] }}
                    </a>
                </div>

                <div class="contact__card">
                    <h2 class="h-sm">Notre atelier</h2>
                    <p class="contact__address">
                        {{ $contact['street'] }}<br>
                        {{ $contact['postal_code'] }} {{ $contact['city'] }}
                    </p>
                    <a class="link-arrow" href="{{ $contact['maps_url'] }}" target="_blank" rel="noopener">
                        Ouvrir dans Google Maps
                        <x-icon name="arrow-right" />
                    </a>
                </div>

                <div class="contact__card contact__card--dark">
                    <h2 class="h-sm">Ce qui se passe ensuite</h2>
                    <ol class="contact__next">
                        <li><span>1</span> Un technicien vous rappelle sous 24h ouvrees</li>
                        <li><span>2</span> Visite technique gratuite sur site</li>
                        <li><span>3</span> Devis chiffre sous 48h, aides deduites</li>
                    </ol>
                </div>
            </aside>
        </div>
    </section>

@endsection
