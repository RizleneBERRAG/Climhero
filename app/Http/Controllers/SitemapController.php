<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Liste des URL publiques, utilisee a la fois par le plan du site HTML
     * et par le sitemap XML.
     */
    private function urls(): array
    {
        $urls = [
            ['loc' => route('home'), 'label' => 'Accueil', 'priority' => '1.0', 'freq' => 'weekly'],
            ['loc' => route('contact'), 'label' => 'Demander un devis', 'priority' => '0.9', 'freq' => 'monthly'],
        ];

        foreach (config('services_catalog') as $service) {
            $urls[] = [
                'loc' => route('service', $service['slug']),
                'label' => $service['title'],
                'priority' => '0.8',
                'freq' => 'monthly',
            ];
        }

        foreach (config('cities') as $slug => $city) {
            $urls[] = [
                'loc' => route('city', $slug),
                'label' => 'Climhero a ' . $city['name'],
                'priority' => '0.7',
                'freq' => 'monthly',
            ];
        }

        $urls[] = ['loc' => route('legal.mentions'), 'label' => 'Mentions legales', 'priority' => '0.2', 'freq' => 'yearly'];
        $urls[] = ['loc' => route('legal.privacy'), 'label' => 'Politique de confidentialite', 'priority' => '0.2', 'freq' => 'yearly'];

        return $urls;
    }

    public function page(): View
    {
        return view('pages.sitemap', [
            'metaTitle' => 'Plan du site | Climhero',
            'metaDescription' => "Toutes les pages du site Climhero : prestations, devis, informations legales.",
            'urls' => $this->urls(),
            'hideCta' => true,
        ]);
    }

    public function xml(): Response
    {
        return response()
            ->view('pages.sitemap-xml', ['urls' => $this->urls()])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            '',
            'Sitemap: ' . route('sitemap.xml'),
            '',
        ]);

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
