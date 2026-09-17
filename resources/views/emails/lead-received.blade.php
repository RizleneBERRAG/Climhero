<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Nouvelle demande de devis</title>
</head>
<body style="margin:0;padding:0;background:#f4f7fa;font-family:Arial,Helvetica,sans-serif;color:#2b3a49;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7fa;padding:28px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:14px;overflow:hidden;border:1px solid #dde5ee;">
                <tr>
                    <td style="background:#0a1a2b;padding:24px 28px;color:#ffffff;">
                        <div style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:#7ff0ff;">Climhero</div>
                        <div style="font-size:21px;font-weight:bold;margin-top:6px;">Nouvelle demande de devis</div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:26px 28px;">
                        <p style="margin:0 0 18px;font-size:15px;line-height:1.6;">
                            Demande recue le {{ $lead->created_at->timezone('Europe/Paris')->format('d/m/Y a H\hi') }}.
                            Reference interne : <strong>#{{ $lead->id }}</strong>.
                        </p>

                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14.5px;line-height:1.6;">
                            @php
                                $rows = [
                                    'Nom' => $lead->full_name,
                                    'Email' => $lead->email,
                                    'Telephone' => $lead->phone,
                                    'Code postal' => $lead->postal_code . ' ' . $lead->city,
                                    'Profil' => ucfirst($lead->profile),
                                    'Prestation' => $lead->service_label ?: 'Non precisee',
                                    'Type de projet' => $lead->project_type ?: 'Non precise',
                                    'Logement' => $lead->housing_type ?: 'Non precise',
                                    'Chauffage actuel' => $lead->current_heating ? config('aides.chauffage_actuel.' . $lead->current_heating, $lead->current_heating) : 'Non precise',
                                    'Echeance' => $lead->deadline ?: 'Non precisee',
                                ];
                            @endphp

                            @foreach ($rows as $label => $value)
                                <tr>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f7;color:#5b7086;width:38%;">{{ $label }}</td>
                                    <td style="padding:8px 0;border-bottom:1px solid #eef2f7;font-weight:bold;">{{ $value }}</td>
                                </tr>
                            @endforeach
                        </table>

                        @if ($lead->message)
                            <div style="margin-top:22px;padding:16px 18px;background:#f4f7fa;border-radius:10px;font-size:14.5px;line-height:1.6;">
                                <div style="font-weight:bold;margin-bottom:6px;">Message du client</div>
                                {{ $lead->message }}
                            </div>
                        @endif

                        <p style="margin:26px 0 0;">
                            <a href="{{ route('admin.leads.show', $lead) }}"
                               style="display:inline-block;background:#ff7a2f;color:#ffffff;text-decoration:none;padding:13px 24px;border-radius:999px;font-weight:bold;font-size:15px;">
                                Ouvrir la demande dans le back-office
                            </a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:18px 28px;background:#f4f7fa;font-size:12.5px;color:#5b7086;">
                        Page d'origine : {{ $lead->page ?: 'non renseignee' }}<br>
                        Adresse IP : {{ $lead->ip }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
