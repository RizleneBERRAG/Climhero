<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ServiceController extends Controller
{
    /**
     * Affiche une page prestation. Chaque prestation possede sa propre vue
     * Blade et sa propre feuille de style dans public/css/pages/{slug}.css.
     */
    public function show(string $slug): View
    {
        $service = config('services_catalog.' . $slug);

        if (! $service) {
            throw new NotFoundHttpException('Prestation introuvable.');
        }

        $others = collect(config('services_catalog'))
            ->except($slug)
            ->values()
            ->all();

        return view('services.' . $slug, [
            'service' => $service,
            'others' => $others,
            'metaTitle' => $service['meta_title'],
            'metaDescription' => $service['meta_description'],
            'pageCss' => $slug,
            'pageJs' => null,
            'bodyClass' => 'page-service page-service--' . $service['accent'],
        ]);
    }
}
