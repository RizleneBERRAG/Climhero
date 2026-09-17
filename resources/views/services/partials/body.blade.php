{{-- Bloc introduction + problemes identifies --}}
<section class="section svc-intro">
    <div class="shell svc-intro__grid">
        <div data-reveal>
            <span class="eyebrow">Le contexte</span>
            <h2 class="h-lg">{{ $service['title'] }} : de quoi parle-t-on vraiment</h2>
            <p class="lede">{{ $service['intro'] }}</p>
        </div>

        <div class="svc-intro__aside" data-reveal>
            <div class="pain">
            <h3 class="pain__title">Les situations qui nous amenent chez vous</h3>
            <ul class="pain__list">
                @foreach ($service['pain'] as $item)
                    <li><x-icon name="alert" /> {{ $item }}</li>
                @endforeach
            </ul>
            <a class="link-arrow" href="{{ route('contact', ['prestation' => $service['slug']]) }}">
                Decrire ma situation
                <x-icon name="arrow-right" />
            </a>
            </div>
        </div>
    </div>
</section>

{{-- Solutions techniques --}}
<section class="section section--mist">
    <div class="shell">
        <div class="section-head">
            <span class="eyebrow">Nos solutions</span>
            <h2 class="h-lg">Quatre reponses techniques, une seule adaptee a votre cas</h2>
            <p class="lede">
                Le bon equipement depend du bati, de l'usage et du budget. Voici ce que nous installons,
                et dans quel contexte chaque solution a du sens.
            </p>
        </div>

        <div class="sol-grid" data-reveal-group>
            @foreach ($service['solutions'] as $solution)
                <article class="sol" data-reveal>
                    <span class="sol__index">{{ str_pad((string) ($loop->index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="sol__title">{{ $solution['title'] }}</h3>
                    <p class="sol__text">{{ $solution['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Engagements --}}
<section class="section svc-engage">
    <div class="shell svc-engage__grid">
        <div data-reveal>
            <span class="eyebrow">Nos engagements</span>
            <h2 class="h-lg">Ce que comprend notre prestation</h2>
            <p class="lede">
                Tout est ecrit sur le devis, ligne par ligne. Pas de supplement decouvert le jour du chantier.
            </p>
            <ul class="engage__list">
                @foreach ($service['bullets'] as $bullet)
                    <li><x-icon name="check-circle" /> {{ $bullet }}</li>
                @endforeach
            </ul>
        </div>

        <aside class="aide-card" data-reveal>
            <span class="aide-card__label">
                <x-icon name="euro" />
                Aides et financement
            </span>
            <p>{{ $service['aide'] }}</p>
            <a class="btn btn--cool btn--block" href="{{ route('home') }}#aides">
                Estimer mes aides en 30 secondes
                <x-icon name="arrow-right" class="ico" />
            </a>
        </aside>
    </div>
</section>

{{-- FAQ --}}
<section class="section section--mist">
    <div class="shell shell--narrow">
        <div class="section-head section-head--center">
            <span class="eyebrow">Questions frequentes</span>
            <h2 class="h-lg">{{ $service['title'] }} : vos questions</h2>
        </div>

        <div class="faq-list" data-accordion data-accordion-single data-reveal-group>
            @foreach ($service['faq'] as $item)
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

{{-- Autres prestations --}}
<section class="section">
    <div class="shell">
        <div class="section-head">
            <span class="eyebrow">Nos autres metiers</span>
            <h2 class="h-md">Nous intervenons aussi sur</h2>
        </div>

        <div class="others" data-reveal-group>
            @foreach ($others as $other)
                <a class="other" data-accent="{{ $other['accent'] }}" href="{{ route('service', $other['slug']) }}" data-reveal>
                    <span class="other__media">
                        @if (($other['photo'] ?? null) && is_file(public_path($other['photo'])))
                            <img src="{{ climhero_asset($other['photo']) }}" alt="" loading="lazy" decoding="async">
                        @else
                            <x-scene :name="$other['accent']" />
                        @endif
                        <span class="other__ico"><x-icon :name="$other['icon']" /></span>
                    </span>
                    <span class="other__text">
                        <strong>{{ $other['title'] }}</strong>
                        <em>{{ $other['baseline'] }}</em>
                    </span>
                    <x-icon name="arrow-right" class="other__arrow" />
                </a>
            @endforeach
        </div>
    </div>
</section>
