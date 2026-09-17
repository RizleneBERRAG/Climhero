<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'metaTitle' => "Climhero, installateur RGE de pompe a chaleur et climatisation en Nord-Isere",
            'metaDescription' => "Pompe a chaleur, climatisation reversible, photovoltaique et froid commercial a Charvieu-Chavagneux, Lyon et dans l'Est lyonnais. 25 ans d'experience, certifie RGE QualiPAC et QualiPV, devis gratuit sous 48h.",
        ]);
    }
}
