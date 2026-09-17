@extends('admin.layout')
@section('title', 'Demande #' . $lead->id)

@section('content')
    <div class="admin__shell">
        <a class="admin__back" href="{{ route('admin.leads') }}">
            <x-icon name="chevron-right" /> Retour a la liste
        </a>

        @if (session('saved'))
            <div class="admin__alert admin__alert--ok">Modifications enregistrees.</div>
        @endif

        <div class="detail">
            <div class="detail__main">
                <div class="detail__head">
                    <div>
                        <h1>{{ $lead->full_name }}</h1>
                        <p>Demande #{{ $lead->id }} recue le {{ $lead->created_at->format('d/m/Y a H\hi') }}</p>
                    </div>
                    <span class="tag tag--{{ $lead->status }}">{{ $lead->status_label }}</span>
                </div>

                <dl class="detail__grid">
                    @php
                        $rows = [
                            'Email' => $lead->email,
                            'Telephone' => $lead->phone,
                            'Code postal' => $lead->postal_code,
                            'Commune' => $lead->city ?: 'Non precisee',
                            'Profil' => ucfirst($lead->profile),
                            'Prestation' => $lead->service_label ?: 'Non precisee',
                            'Type de projet' => $lead->project_type ?: 'Non precise',
                            'Logement' => $lead->housing_type ?: 'Non precise',
                            'Chauffage actuel' => $lead->current_heating ? config('aides.chauffage_actuel.' . $lead->current_heating, $lead->current_heating) : 'Non precise',
                            'Echeance' => $lead->deadline ?: 'Non precisee',
                        ];
                    @endphp
                    @foreach ($rows as $label => $value)
                        <div>
                            <dt>{{ $label }}</dt>
                            <dd>{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>

                @if ($lead->message)
                    <div class="detail__message">
                        <h2>Message du client</h2>
                        <p>{{ $lead->message }}</p>
                    </div>
                @endif

                <div class="detail__trace">
                    Page d'origine : {{ $lead->page ?: 'non renseignee' }} &middot; IP : {{ $lead->ip }}
                </div>
            </div>

            <aside class="detail__side">
                <div class="detail__actions">
                    <a class="admin__btn admin__btn--primary admin__btn--block" href="tel:{{ preg_replace('/\s+/', '', $lead->phone) }}">Appeler</a>
                    <a class="admin__btn admin__btn--block" href="mailto:{{ $lead->email }}">Repondre par email</a>
                </div>

                <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="detail__form">
                    @csrf
                    @method('PATCH')

                    <label class="admin__field">
                        <span>Statut</span>
                        <select name="status">
                            @foreach (\App\Models\Lead::STATUSES as $value => $label)
                                <option value="{{ $value }}" @selected($lead->status === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="admin__field">
                        <span>Note interne</span>
                        <textarea name="internal_note" rows="7" placeholder="Compte rendu d'appel, date de visite, montant du devis...">{{ old('internal_note', $lead->internal_note) }}</textarea>
                    </label>

                    <button type="submit" class="admin__btn admin__btn--primary admin__btn--block">Enregistrer</button>
                </form>

                @if ($lead->contacted_at)
                    <p class="detail__meta">Premier contact le {{ $lead->contacted_at->format('d/m/Y') }}</p>
                @endif
            </aside>
        </div>
    </div>
@endsection
