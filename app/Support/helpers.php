<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('climhero_asset')) {
    /**
     * Genere une URL d'asset avec un parametre de version base sur la date de
     * modification du fichier. Evite d'avoir a purger le cache navigateur a
     * chaque mise a jour de CSS ou de JS, sans build Vite.
     */
    function climhero_asset(string $path): string
    {
        $path = ltrim($path, '/');
        $absolute = public_path($path);

        if (! is_file($absolute)) {
            return asset($path);
        }

        return asset($path) . '?v=' . filemtime($absolute);
    }
}

if (! function_exists('climhero_local_business_schema')) {
    /**
     * Donnees structurees LocalBusiness injectees sur toutes les pages.
     */
    function climhero_local_business_schema(): array
    {
        $brand = config('climhero.brand');
        $contact = config('climhero.contact');

        $areas = collect(config('climhero.zones'))
            ->flatMap(fn (array $zone) => $zone['cities'])
            ->map(fn (string $city) => ['@type' => 'City', 'name' => $city])
            ->values()
            ->all();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'HVACBusiness',
            '@id' => url('/') . '#organisation',
            'name' => $brand['legal_name'],
            'alternateName' => $brand['name'],
            'description' => $brand['claim'],
            'url' => url('/'),
            'telephone' => $contact['phone_link'],
            'email' => $contact['email'],
            'foundingDate' => (string) $brand['founded'],
            'priceRange' => '$$',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $contact['street'],
                'postalCode' => $contact['postal_code'],
                'addressLocality' => $contact['city'],
                'addressRegion' => $contact['region'],
                'addressCountry' => $contact['country'],
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => $contact['latitude'],
                'longitude' => $contact['longitude'],
            ],
            'openingHours' => $contact['hours_schema'],
            'areaServed' => $areas,
            'hasCredential' => collect(config('climhero.certifications'))
                ->map(fn (array $item) => $item['label'])
                ->all(),
            'makesOffer' => collect(config('services_catalog'))
                ->map(fn (array $service) => [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service['title'],
                        'url' => route('service', $service['slug']),
                    ],
                ])
                ->values()
                ->all(),
        ];
    }
}

if (! function_exists('climhero_faq_schema')) {
    /**
     * Donnees structurees FAQPage a partir d'un tableau de questions.
     */
    function climhero_faq_schema(array $faq): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faq)->map(fn (array $item) => [
                '@type' => 'Question',
                'name' => $item['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['a'],
                ],
            ])->values()->all(),
        ];
    }
}

if (! function_exists('climhero_is_route')) {
    /**
     * Aide de navigation pour marquer le lien actif.
     */
    function climhero_is_route(string ...$names): bool
    {
        foreach ($names as $name) {
            if (Route::is($name)) {
                return true;
            }
        }

        return false;
    }
}
