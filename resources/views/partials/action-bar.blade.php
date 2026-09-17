@php $contact = config('climhero.contact'); @endphp

<div class="action-bar">
    <a class="btn btn--ghost" href="tel:{{ $contact['phone_link'] }}">
        <x-icon name="phone" class="ico" />
        Appeler
    </a>
    <a class="btn btn--primary" href="{{ route('contact') }}">
        Devis gratuit
    </a>
</div>
