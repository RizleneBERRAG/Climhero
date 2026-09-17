<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $leads = Lead::query()
            ->search($request->query('q'))
            ->status($request->query('statut'))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $counts = Lead::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('admin.leads.index', [
            'leads' => $leads,
            'counts' => $counts,
            'total' => Lead::count(),
            'newCount' => Lead::where('status', 'nouveau')->count(),
            'weekCount' => Lead::where('created_at', '>=', now()->subWeek())->count(),
        ]);
    }

    public function show(Lead $lead)
    {
        return view('admin.leads.show', ['lead' => $lead]);
    }

    public function update(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', array_keys(Lead::STATUSES))],
            'internal_note' => ['nullable', 'string', 'max:5000'],
        ]);

        if ($data['status'] !== 'nouveau' && ! $lead->contacted_at) {
            $data['contacted_at'] = now();
        }

        $lead->update($data);

        return back()->with('saved', true);
    }

    public function export(): StreamedResponse
    {
        $filename = 'climhero-demandes-' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fwrite($handle, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM pour Excel

            fputcsv($handle, [
                'ID', 'Date', 'Statut', 'Prenom', 'Nom', 'Email', 'Telephone',
                'Code postal', 'Commune', 'Profil', 'Prestation', 'Type de projet',
                'Logement', 'Chauffage actuel', 'Echeance', 'Message',
            ], ';');

            Lead::query()->latest()->chunk(200, function ($leads) use ($handle) {
                foreach ($leads as $lead) {
                    fputcsv($handle, [
                        $lead->id,
                        $lead->created_at->format('d/m/Y H:i'),
                        $lead->status_label,
                        $lead->first_name,
                        $lead->last_name,
                        $lead->email,
                        $lead->phone,
                        $lead->postal_code,
                        $lead->city,
                        $lead->profile,
                        $lead->service_label,
                        $lead->project_type,
                        $lead->housing_type,
                        $lead->current_heating,
                        $lead->deadline,
                        str_replace(["\r", "\n"], ' ', (string) $lead->message),
                    ], ';');
                }
            });

            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }
}
