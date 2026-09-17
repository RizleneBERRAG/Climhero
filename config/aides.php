<?php

/*
|--------------------------------------------------------------------------
| Bareme indicatif des aides a la renovation energetique
|--------------------------------------------------------------------------
| Les montants sont volontairement exprimes en fourchettes et centralises
| ici : les baremes MaPrimeRenov et CEE evoluent chaque annee, il suffit de
| mettre a jour ce fichier sans toucher au front. Le simulateur affiche
| toujours la mention d'estimation non contractuelle.
|
| Mis a jour : janvier 2026.
*/

return [

    'profils' => [
        'tres_modeste' => 'Revenus tres modestes',
        'modeste' => 'Revenus modestes',
        'intermediaire' => 'Revenus intermediaires',
        'superieur' => 'Revenus superieurs',
    ],

    'chauffage_actuel' => [
        'fioul' => 'Chaudiere fioul',
        'gaz' => 'Chaudiere gaz',
        'electrique' => 'Convecteurs electriques',
        'bois' => 'Bois ou autre',
        'aucun' => 'Pas de chauffage central',
    ],

    /*
     | Bonus applique quand le systeme depose est une chaudiere fioul ou gaz
     | (operations Coup de pouce chauffage).
     */
    'bonus_depose' => [
        'fioul' => 800,
        'gaz' => 400,
        'electrique' => 0,
        'bois' => 0,
        'aucun' => 0,
    ],

    'equipements' => [

        'pac_air_eau' => [
            'label' => 'Pompe a chaleur air/eau',
            'service' => 'pompe-a-chaleur',
            'cout' => [12000, 18000],
            'mpr' => [
                'tres_modeste' => [4000, 5000],
                'modeste' => [3000, 4000],
                'intermediaire' => [2000, 3000],
                'superieur' => [0, 0],
            ],
            'cee' => [
                'tres_modeste' => [2500, 4000],
                'modeste' => [2500, 4000],
                'intermediaire' => [1500, 2500],
                'superieur' => [1500, 2500],
            ],
            'tva' => 5.5,
            'bonus_eligible' => true,
            'economie' => 'Jusqu a 60 % sur la facture de chauffage par rapport a une chaudiere fioul',
        ],

        'pac_air_air' => [
            'label' => 'Pompe a chaleur air/air ou climatisation reversible',
            'service' => 'climatisation-reversible',
            'cout' => [4500, 9000],
            'mpr' => [
                'tres_modeste' => [0, 0],
                'modeste' => [0, 0],
                'intermediaire' => [0, 0],
                'superieur' => [0, 0],
            ],
            'cee' => [
                'tres_modeste' => [400, 900],
                'modeste' => [400, 900],
                'intermediaire' => [200, 600],
                'superieur' => [200, 600],
            ],
            'tva' => 20,
            'economie' => 'Le chauffage electrique le plus economique, avec un SCOP superieur a 4',
        ],

        'ceti' => [
            'label' => 'Chauffe-eau thermodynamique',
            'service' => 'eau-chaude-sanitaire',
            'cout' => [2800, 4200],
            'mpr' => [
                'tres_modeste' => [1200, 1200],
                'modeste' => [800, 800],
                'intermediaire' => [400, 400],
                'superieur' => [0, 0],
            ],
            'cee' => [
                'tres_modeste' => [150, 400],
                'modeste' => [150, 400],
                'intermediaire' => [100, 300],
                'superieur' => [100, 300],
            ],
            'tva' => 5.5,
            'economie' => 'Environ trois fois moins d electricite qu un cumulus classique',
        ],

        'photovoltaique' => [
            'label' => 'Panneaux photovoltaiques en autoconsommation',
            'service' => 'panneaux-photovoltaiques',
            'cout' => [8000, 14000],
            'mpr' => [
                'tres_modeste' => [0, 0],
                'modeste' => [0, 0],
                'intermediaire' => [0, 0],
                'superieur' => [0, 0],
            ],
            'cee' => [
                'tres_modeste' => [600, 1100],
                'modeste' => [600, 1100],
                'intermediaire' => [600, 1100],
                'superieur' => [600, 1100],
            ],
            'tva' => 10,
            'economie' => 'Une production revendue ou autoconsommee pendant plus de 25 ans',
            'note' => 'Prime a l autoconsommation versee par EDF OA, calculee selon la puissance installee.',
        ],

        'granules' => [
            'label' => 'Chaudiere a granules de bois',
            'service' => 'pompe-a-chaleur',
            'cout' => [16000, 24000],
            'mpr' => [
                'tres_modeste' => [5000, 7000],
                'modeste' => [4000, 5500],
                'intermediaire' => [2500, 3500],
                'superieur' => [0, 0],
            ],
            'cee' => [
                'tres_modeste' => [2500, 4000],
                'modeste' => [2500, 4000],
                'intermediaire' => [1500, 2500],
                'superieur' => [1500, 2500],
            ],
            'tva' => 5.5,
            'bonus_eligible' => true,
            'economie' => 'Un combustible parmi les moins chers du marche au kWh',
        ],
    ],

    'disclaimer' => "Estimation indicative fournie a titre informatif, calculee a partir des baremes connus en janvier 2026. Elle ne constitue pas un engagement. Le montant definitif depend de votre revenu fiscal de reference, de la composition du foyer, de la localisation du logement et de l'equipement retenu. Nous le calculons precisement lors de la visite technique.",
];
