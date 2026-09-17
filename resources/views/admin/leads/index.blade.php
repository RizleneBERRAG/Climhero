@extends('admin.layout')
@section('title', 'Demandes de devis')

@section('content')
    <div class="admin__shell">
        <div class="admin__head">
            <div>
                <h1>Demandes de devis</h1>
                <p>{{ $total }} demandes enregistrees depuis la mise en ligne du site.</p>
            </div>
        </div>

        <div class="kpis">
            <div class="kpi">
                <span class="kpi__value">{{ $newCount }}</span>
                <span class="kpi__label">a traiter</span>
            </div>
            <div class="kpi">
                <span class="kpi__value">{{ $weekCount }}</span>
                <span class="kpi__label">recues cette semaine</span>
            </div>
            @foreach (['devis' => 'devis envoyes', 'gagne' => 'affaires signees'] as $key => $label)
                <div class="kpi">
                    <span class="kpi__value">{{ $counts[$key] ?? 0 }}</span>
                    <span class="kpi__label">{{ $label }}</span>
                </div>
            @endforeach
        </div>

        <form class="filters" method="GET">
            <label class="filters__search">
                <x-icon name="search" />
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Nom, email, telephone, commune">
            </label>

            <select name="statut" onchange="this.form.submit()">
                <option value="">Tous les statuts</option>
                @foreach (\App\Models\Lead::STATUSES as $value => $label)
                    <option value="{{ $value }}" @selected(request('statut') === $value)>{{ $label }}</option>
                @endforeach
            </select>

            <button type="submit" class="admin__btn">Filtrer</button>
            @if (request('q') || request('statut'))
                <a class="admin__link" href="{{ route('admin.leads') }}">Reinitialiser</a>
            @endif
        </form>

        @if ($leads->isEmpty())
            <div class="empty">
                <x-icon name="inbox" />
                <p>Aucune demande ne correspond a cette recherche.</p>
            </div>
        @else
            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Recue le</th>
                            <th>Client</th>
                            <th>Projet</th>
                            <th>Secteur</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leads as $lead)
                            <tr>
                                <td class="nowrap">{{ $lead->created_at->format('d/m/Y') }}<small>{{ $lead->created_at->format('H:i') }}</small></td>
                                <td>
                                    <strong>{{ $lead->full_name }}</strong>
                                    <small>{{ $lead->phone }}</small>
                                </td>
                                <td>
                                    {{ $lead->service_label ?: 'Non precise' }}
                                    <small>{{ $lead->project_type ?: 'type non precise' }}</small>
                                </td>
                                <td class="nowrap">{{ $lead->postal_code }}<small>{{ $lead->city }}</small></td>
                                <td><span class="tag tag--{{ $lead->status }}">{{ $lead->status_label }}</span></td>
                                <td class="nowrap"><a class="admin__btn admin__btn--sm" href="{{ route('admin.leads.show', $lead) }}">Ouvrir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">{{ $leads->links() }}</div>
        @endif
    </div>
@endsection
