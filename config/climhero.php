<?php

/*
|--------------------------------------------------------------------------
| Configuration metier Climhero
|--------------------------------------------------------------------------
| Toutes les donnees editoriales transverses du site (coordonnees, preuves,
| zone d'intervention, marques, avis) sont centralisees ici pour eviter de
| les dupliquer dans les vues Blade.
*/

return [

    'brand' => [
        'name' => 'Climhero',
        'legal_name' => 'CLIMHERO',
        'baseline' => 'Le confort thermique, sans mauvaise surprise',
        'claim' => 'Installateur RGE de pompes a chaleur, climatisation et photovoltaique en Nord-Isere et Est lyonnais.',
        'founded' => 2000,
        'experience_years' => 25,
    ],

    'contact' => [
        'phone' => '09 74 56 00 35',
        'phone_link' => '+33974560035',
        'email' => 'contact@climhero.fr',
        'street' => '16 rue Raoul de Gaucourt',
        'postal_code' => '38510',
        'city' => 'Charvieu-Chavagneux',
        'region' => 'Auvergne-Rhone-Alpes',
        'country' => 'FR',
        'latitude' => 45.7431,
        'longitude' => 5.1836,
        'hours' => 'Du lundi au vendredi, 7h30 a 18h00',
        'hours_schema' => ['Mo-Fr 07:30-18:00'],
        'maps_url' => 'https://maps.google.com/?q=16+rue+Raoul+de+Gaucourt+38510+Charvieu-Chavagneux',
        'facebook' => 'https://www.facebook.com/',
    ],

    'lead_inbox' => env('CLIMHERO_LEAD_INBOX', 'contact@climhero.fr'),

    'stats' => [
        ['value' => 25, 'suffix' => ' ans', 'label' => "d'experience en genie climatique"],
        ['value' => 2400, 'suffix' => '+', 'label' => 'installations realisees'],
        ['value' => 48, 'suffix' => 'h', 'label' => 'de delai moyen de depannage'],
        ['value' => 98, 'suffix' => '%', 'label' => 'de clients qui nous recommandent'],
    ],

    'certifications' => [
        // 'logo' est optionnel : si le fichier existe, il remplace l'icone bouclier.
        ['code' => 'qualipac', 'label' => 'RGE QualiPAC', 'detail' => 'Pompes a chaleur air/air et air/eau', 'logo' => 'images/labels/rge-qualipac.webp'],
        ['code' => 'qualipv', 'label' => 'RGE QualiPV', 'detail' => 'Installations photovoltaiques'],
        ['code' => 'fluides', 'label' => 'Attestation fluides', 'detail' => 'Manipulation des fluides frigorigenes, categorie I', 'logo' => 'images/labels/manipulateur-fluides.webp'],
        ['code' => 'veritas', 'label' => 'Bureau Veritas', 'detail' => 'Controle et conformite des installations', 'logo' => 'images/labels/bureau-veritas.webp'],
        ['code' => 'decennale', 'label' => 'Garantie decennale', 'detail' => 'Assurance responsabilite civile et decennale'],
    ],

    'brands' => ['Daikin', 'Atlantic', 'Toshiba', 'Mitsubishi Electric', 'Panasonic', 'De Dietrich'],

    'zones' => [
        [
            'name' => 'Nord-Isere',
            'cities' => ['Charvieu-Chavagneux', 'Pont-de-Cheruy', 'Bourgoin-Jallieu', 'La Verpilliere', 'Cremieu', "L'Isle-d'Abeau", 'Villefontaine'],
        ],
        [
            'name' => 'Est lyonnais',
            'cities' => ['Meyzieu', 'Saint-Priest', 'Genas', 'Decines-Charpieu', 'Saint-Laurent-de-Mure', 'Chassieu', 'Jonage'],
        ],
        [
            'name' => 'Lyon et Ain',
            'cities' => ['Lyon', 'Villeurbanne', 'Beynost', 'Miribel', 'Montluel', 'Vaulx-en-Velin'],
        ],
    ],

    'process' => [
        [
            'step' => '01',
            'title' => 'Echange en 10 minutes',
            'text' => "Vous nous decrivez votre logement et votre probleme. On vous dit tout de suite si votre projet est realisable et dans quel ordre de prix.",
        ],
        [
            'step' => '02',
            'title' => 'Visite technique gratuite',
            'text' => "Un technicien se deplace, mesure les deperditions, verifie l'electricite et les evacuations. Aucune surprise le jour du chantier.",
        ],
        [
            'step' => '03',
            'title' => 'Devis et montage des aides',
            'text' => "Vous recevez un devis detaille sous 48h, avec le montant de MaPrimeRenov et de la prime CEE deja deduit. On monte les dossiers a votre place.",
        ],
        [
            'step' => '04',
            'title' => 'Installation par nos equipes',
            'text' => "Pas de sous-traitance. Nos techniciens salaries posent, mettent en service et vous forment a l'utilisation de votre equipement.",
        ],
        [
            'step' => '05',
            'title' => 'Entretien et depannage',
            'text' => "Contrat d'entretien annuel, suivi des performances et intervention de depannage sous 48h en moyenne.",
        ],
    ],

    'reviews' => [
        [
            'name' => 'Sandrine M.',
            'city' => 'Meyzieu',
            'rating' => 5,
            'job' => 'Pompe a chaleur air/eau Daikin',
            'text' => "Remplacement de notre vieille chaudiere fioul par une PAC. Devis clair, aides expliquees point par point, chantier fait en deux jours. La facture de chauffage a fondu.",
        ],
        [
            'name' => 'Laurent B.',
            'city' => 'Bourgoin-Jallieu',
            'rating' => 5,
            'job' => 'Climatisation reversible multi-split',
            'text' => "Trois splits poses dans une maison des annees 70 sans rien casser. L'equipe est ponctuelle, propre et prend le temps d'expliquer le fonctionnement.",
        ],
        [
            'name' => 'Restaurant Le Cedre',
            'city' => 'Saint-Priest',
            'rating' => 5,
            'job' => 'Chambre froide et clim de salle',
            'text' => "Chambre froide en panne un vendredi soir, technicien sur place le samedi matin. Depuis, on leur confie aussi la maintenance de la climatisation de la salle.",
        ],
        [
            'name' => 'Karim T.',
            'city' => 'Villeurbanne',
            'rating' => 5,
            'job' => 'Photovoltaique 6 kWc',
            'text' => "Etude de production serieuse, pas de promesses en l'air. Demarches administratives et raccordement Enedis geres de A a Z par Climhero.",
        ],
    ],

    'faq' => [
        [
            'q' => "Quelles aides puis-je obtenir pour une pompe a chaleur en 2026 ?",
            'a' => "Vous pouvez cumuler MaPrimeRenov, la prime CEE Coup de pouce chauffage et la TVA a 5,5 %. Le montant depend de vos revenus, de la composition du foyer et de l'equipement remplace. Comme nous sommes certifies RGE QualiPAC, votre dossier est eligible. Nous calculons le reste a charge directement sur le devis.",
        ],
        [
            'q' => "Combien de temps dure une installation de pompe a chaleur ?",
            'a' => "Comptez une journee pour une PAC air/air simple et deux a trois jours pour une PAC air/eau avec depose de chaudiere. La visite technique prealable permet de figer la duree exacte avant la signature.",
        ],
        [
            'q' => "Intervenez-vous en depannage sur un materiel que vous n'avez pas installe ?",
            'a' => "Oui. Nos techniciens interviennent sur la majorite des marques du marche, meme si l'installation d'origine a ete realisee par une autre entreprise. Delai moyen d'intervention de 48h sur notre zone.",
        ],
        [
            'q' => "Une climatisation reversible peut-elle chauffer toute la maison en hiver ?",
            'a' => "Sur une maison correctement isolee de la region lyonnaise, oui, a condition de dimensionner correctement le nombre d'unites interieures. Pour une maison ancienne mal isolee, nous recommandons plutot une PAC air/eau sur le circuit de radiateurs existant.",
        ],
        [
            'q' => "Proposez-vous un contrat d'entretien ?",
            'a' => "Oui, avec une visite annuelle obligatoire pour les equipements contenant plus de 2 kg de fluide frigorigene. Le contrat inclut le controle d'etancheite, le nettoyage des echangeurs, le reglage et une priorite d'intervention en cas de panne.",
        ],
        [
            'q' => "Dans quelles villes intervenez-vous ?",
            'a' => "Depuis Charvieu-Chavagneux, nous couvrons le Nord-Isere, l'Est lyonnais, Lyon, Villeurbanne et le sud de l'Ain, soit un rayon d'environ 40 km autour de notre atelier.",
        ],
    ],
];
