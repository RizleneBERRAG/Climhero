<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(Request $request): View
    {
        // Preselection depuis le simulateur ou depuis une page prestation.
        $preselect = $request->query('prestation');
        $projet = $request->query('projet');

        if (! $preselect && $projet) {
            $preselect = config('aides.equipements.' . $projet . '.service');
        }

        return view('pages.contact', [
            'metaTitle' => 'Devis gratuit pour votre projet de chauffage ou de climatisation | Climhero',
            'metaDescription' => "Decrivez votre projet en deux minutes. Climhero vous rappelle, realise une visite technique gratuite et vous envoie un devis chiffre sous 48h, aides deduites.",
            'preselect' => $preselect,
            'hideCta' => true,
        ]);
    }

    public function store(LeadRequest $request): RedirectResponse
    {
        $lead = Lead::create(array_merge(
            $request->safe()->except(['website', 'started_at', 'consent']),
            [
                'consent' => true,
                'status' => 'nouveau',
                'source' => 'formulaire',
                'page' => $request->input('page', url()->previous()),
                'ip' => $request->ip(),
                'user_agent' => (string) $request->userAgent(),
            ]
        ));

        try {
            Mail::to(config('climhero.lead_inbox'))->send(new LeadReceived($lead));
        } catch (\Throwable $exception) {
            // Une erreur SMTP ne doit jamais faire perdre la demande :
            // elle est deja enregistree en base et visible dans le back-office.
            Log::error('Envoi de la notification de lead impossible', [
                'lead_id' => $lead->id,
                'message' => $exception->getMessage(),
            ]);
        }

        return redirect()
            ->route('contact')
            ->with('lead_sent', true)
            ->withFragment('formulaire');
    }
}
