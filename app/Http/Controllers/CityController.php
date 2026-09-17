<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CityController extends Controller
{
    public function show(string $slug): View
    {
        $city = config('cities.' . $slug);

        if (! $city) {
            throw new NotFoundHttpException('Ville introuvable.');
        }

        return view('pages.city', [
            'city' => $city,
            'slug' => $slug,
            'metaTitle' => 'Installateur de pompe a chaleur et climatisation a ' . $city['name'] . ' | Climhero',
            'metaDescription' => "Climhero installe pompes a chaleur, climatisation reversible, photovoltaique et froid commercial a " . $city['name'] . ". Entreprise certifiee RGE, devis gratuit sous 48h.",
            'pageCss' => 'ville',
            'bodyClass' => 'page-city',
        ]);
    }
}
