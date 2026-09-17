@php $contact = config('climhero.contact'); @endphp

<section class="cta-band">
    <div class="shell cta-band__inner">
        <div data-reveal>
            <span class="eyebrow">Passons a l'action</span>
            <h2>Un projet, une panne, ou juste une question ?</h2>
            <p>
                Decrivez-nous votre situation en deux minutes. Un technicien vous rappelle, vous dit franchement
                ce qui est faisable et vous recevez un devis chiffre sous 48h, aides deja deduites.
            </p>
            <div class="cta-band__actions">
                <a class="btn btn--primary btn--lg" href="{{ route('contact') }}">
                    Demander mon devis gratuit
                    <x-icon name="arrow-right" class="ico" />
                </a>
                <a class="btn btn--ghost-light btn--lg" href="tel:{{ $contact['phone_link'] }}">
                    <x-icon name="phone" class="ico" />
                    {{ $contact['phone'] }}
                </a>
            </div>
        </div>

        <div class="cta-card" data-reveal style="--reveal-delay:120ms">
            <h3>Ce que vous obtenez</h3>
            <ul class="cta-card__list">
                <li><x-icon name="check-circle" /> Une reponse humaine, pas un formulaire dans le vide</li>
                <li><x-icon name="check-circle" /> Une visite technique gratuite et sans engagement</li>
                <li><x-icon name="check-circle" /> Le montant exact de vos aides calcule avant signature</li>
                <li><x-icon name="check-circle" /> Une pose realisee par nos salaries, sans sous-traitance</li>
                <li><x-icon name="check-circle" /> Un interlocuteur unique du premier appel au SAV</li>
            </ul>
        </div>
    </div>
</section>
