<?php

/*
|--------------------------------------------------------------------------
| Catalogue des prestations
|--------------------------------------------------------------------------
| Une entree par page prestation. Le slug sert de cle de route, de nom de
| vue Blade (resources/views/services/{slug}.blade.php) et de nom de
| feuille de style dediee (public/css/pages/{slug}.css).
*/

return [

    'climatisation-reversible' => [
        'slug' => 'climatisation-reversible',
        'photo' => 'images/services/climatisation.webp',
        'photo_alt' => 'Installation de climatisation reversible par Climhero a Charvieu-Chavagneux',
        'nav' => 'Climatisation',
        'title' => 'Climatisation reversible',
        'h1' => 'Installateur de climatisation reversible en Nord-Isere et Est lyonnais',
        'meta_title' => 'Installation de climatisation reversible a Lyon et en Nord-Isere | Climhero',
        'meta_description' => "Climhero installe votre climatisation reversible mono ou multi-split a Charvieu-Chavagneux, Lyon, Meyzieu et Bourgoin-Jallieu. Devis gratuit sous 48h, pose par des techniciens salaries certifies.",
        'accent' => 'cool',
        'icon' => 'snowflake',
        'baseline' => "Rafraichir l'ete, chauffer l'hiver, avec un seul equipement.",
        'intro' => "Misez sur un travail bien fait en confiant la pose de votre climatisation a Climhero. La climatisation reversible est la solution la plus rapide a mettre en place pour gagner en confort toute l'annee : une unite exterieure, une ou plusieurs unites interieures, et vous pilotez la temperature piece par piece. En activite depuis 25 ans, nous maitrisons la pose de tous les types de systemes de climatisation, pour la maison comme pour le local professionnel. Nos techniciens travaillent avec rigueur et veillent a ce que chaque composant soit correctement positionne et connecte, puis assurent une mise en service impeccable de votre climatiseur inverter.",
        'pain' => [
            "Des chambres a l'etage invivables de juin a septembre",
            "Des ventilateurs qui brassent de l'air chaud sans rien resoudre",
            "Un chauffage electrique d'appoint qui fait exploser la facture en hiver",
        ],
        'solutions' => [
            ['title' => 'Mono-split', 'text' => "Une unite interieure pour une piece de vie ou une chambre. Installation en une demi-journee, a partir de 1 900 euros pose comprise."],
            ['title' => 'Multi-split', 'text' => "De deux a cinq unites interieures sur un seul groupe exterieur. La solution la plus frequente en maison individuelle."],
            ['title' => 'Gainable', 'text' => "Les unites sont dissimulees dans les combles ou un faux plafond, seules les grilles sont visibles. Le rendu le plus discret."],
            ['title' => 'Console et cassette', 'text' => "Pour les commerces, bureaux et locaux professionnels ou la diffusion doit etre homogene sur un grand volume."],
        ],
        'bullets' => [
            "Dimensionnement calcule piece par piece, pas au doigt mouille",
            "Unites Daikin, Toshiba, Mitsubishi Electric et Panasonic",
            "Liaisons frigorifiques soignees et passages de murs etanches",
            "Mise en service, controle d'etancheite et formation a l'usage",
        ],
        'aide' => "La climatisation reversible n'ouvre pas droit a MaPrimeRenov, mais une PAC air/air peut etre eligible a certaines primes CEE selon votre situation. Nous vous le disons franchement des le premier echange.",
        'faq' => [
            ['q' => "Quel budget pour climatiser une maison de 100 m2 ?", 'a' => "Comptez entre 5 500 et 9 000 euros pour un multi-split de trois a quatre unites, pose et mise en service comprises. Le prix varie surtout selon la longueur des liaisons frigorifiques et la difficulte d'acces au groupe exterieur."],
            ['q' => "Une clim reversible consomme-t-elle beaucoup ?", 'a' => "Un modele recent affiche un SCOP superieur a 4, c'est-a-dire qu'il restitue plus de 4 kWh de chaleur pour 1 kWh consomme. C'est le mode de chauffage electrique le plus economique du marche."],
            ['q' => "Faut-il une autorisation pour poser un groupe exterieur ?", 'a' => "En maison individuelle, une declaration prealable de travaux est souvent necessaire si le groupe est visible depuis la rue. En copropriete, l'accord de l'assemblee generale est requis. Nous vous accompagnons sur le dossier."],
            ['q' => "Quelle maintenance pour une climatisation ?", 'a' => "Un nettoyage des filtres tous les mois en saison, et une visite annuelle par un professionnel pour le controle d'etancheite et le nettoyage des echangeurs. Obligatoire au dela de 2 kg de fluide."],
        ],
    ],

    'pompe-a-chaleur' => [
        'slug' => 'pompe-a-chaleur',
        'photo' => 'images/services/pompe-a-chaleur.webp',
        'photo_alt' => 'Pompe a chaleur air/eau installee par Climhero en Nord-Isere',
        'nav' => 'Pompe a chaleur et chauffage',
        'title' => 'Pompe a chaleur et chauffage',
        'h1' => 'Installation de pompe a chaleur et de chauffage performant',
        'meta_title' => 'Installateur RGE QualiPAC de pompe a chaleur a Lyon et Nord-Isere | Climhero',
        'meta_description' => "Remplacez votre chaudiere fioul ou gaz par une pompe a chaleur air/eau. Climhero est certifie RGE QualiPAC, monte vos dossiers MaPrimeRenov et CEE et installe en 2 a 3 jours.",
        'accent' => 'warm',
        'icon' => 'flame',
        'baseline' => "Diviser sa facture de chauffage sans sacrifier le confort.",
        'intro' => "Remplacer une chaudiere fioul ou gaz par une pompe a chaleur air/eau reste le geste de renovation energetique le plus rentable pour une maison de la region lyonnaise. La PAC puise les calories de l'air exterieur et les restitue dans votre circuit de chauffage existant. Bien dimensionnee, elle couvre les besoins jusqu'a des temperatures negatives sans appoint permanent.",
        'pain' => [
            "Une chaudiere fioul de plus de 15 ans qui coute une fortune a remplir",
            "Des radiateurs tiedes et des pieces qui ne montent jamais en temperature",
            "Un ballon d'eau chaude qui tombe en panne au mauvais moment",
        ],
        'solutions' => [
            ['title' => 'PAC air/eau', 'text' => "Se raccorde sur vos radiateurs ou votre plancher chauffant. La solution reine pour remplacer une chaudiere, eligible MaPrimeRenov."],
            ['title' => 'PAC hybride', 'text' => "Une PAC couplee a une chaudiere gaz a condensation qui prend le relais par grand froid. Ideal en renovation partielle."],
            ['title' => 'Chaudiere a granules', 'text' => "Pour les maisons anciennes a forts besoins ou le bois reste la solution la plus economique a l'usage."],
            ['title' => 'Plancher chauffant hydraulique', 'text' => "Le meilleur emetteur pour une PAC, avec une temperature de depart basse et un confort homogene. Nous realisons aussi les reseaux d'eau et les salles de bain cle en main."],
        ],
        'bullets' => [
            "Etude thermique et calcul des deperditions avant tout devis",
            "Depose et evacuation de l'ancienne chaudiere et de la cuve fioul",
            "Dossiers MaPrimeRenov et CEE montes et suivis par nos soins",
            "Mise en service, equilibrage hydraulique et reglage des courbes de chauffe",
        ],
        'aide' => "MaPrimeRenov, prime CEE Coup de pouce chauffage et TVA a 5,5 % sont cumulables. Selon vos revenus, le reste a charge sur une PAC air/eau peut descendre tres bas. Notre certification RGE QualiPAC conditionne l'acces a ces aides.",
        'faq' => [
            ['q' => "Une pompe a chaleur fonctionne-t-elle par grand froid ?", 'a' => "Oui. Les modeles actuels produisent de la chaleur jusqu'a moins 20 degres exterieurs. En region lyonnaise, les temperatures de base sont de l'ordre de moins 10 degres, ce qui reste largement dans la plage de fonctionnement nominal."],
            ['q' => "Puis-je garder mes radiateurs existants ?", 'a' => "Dans la majorite des cas oui, a condition que la temperature de depart necessaire reste sous 55 degres. Notre etude le verifie radiateur par radiateur et nous remplacons uniquement ceux qui sont sous-dimensionnes."],
            ['q' => "Quel est le delai entre le devis et la pose ?", 'a' => "Comptez deux a quatre semaines, le temps de valider le dossier d'aides et de commander le materiel. En remplacement d'urgence sur une chaudiere en panne, nous pouvons accelerer."],
            ['q' => "Quelle duree de vie pour une PAC air/eau ?", 'a' => "Entre 15 et 20 ans avec un entretien annuel. Le compresseur est la piece maitresse, c'est aussi celle que l'entretien protege le mieux."],
        ],
    ],

    'genie-climatique' => [
        'slug' => 'genie-climatique',
        'photo' => 'images/services/genie-climatique.webp',
        'photo_alt' => 'Installation de genie climatique tertiaire realisee par Climhero',
        'nav' => 'Genie climatique',
        'title' => 'Genie climatique',
        'h1' => 'Genie climatique pour les professionnels et le tertiaire',
        'meta_title' => 'Entreprise de genie climatique a Lyon et Nord-Isere | Climhero',
        'meta_description' => "Conception, installation et maintenance CVC pour bureaux, commerces, industrie et collectivites. Climhero intervient sur la ventilation, le traitement d'air et la climatisation tertiaire.",
        'accent' => 'steel',
        'icon' => 'wind',
        'baseline' => "Concevoir, installer et maintenir des installations CVC qui tiennent dans la duree.",
        'intro' => "Le genie climatique couvre l'ensemble des installations de chauffage, ventilation et climatisation d'un batiment. Nous repondons aux besoins des entreprises tertiaires, des industries, des architectes et des collectivites de toute la region Rhone-Alpes. Sur un projet de cette nature, la performance ne se joue pas sur la marque du materiel mais sur le dimensionnement, l'equilibrage aeraulique et la qualite de la mise en service. C'est exactement la que se situe notre metier depuis 25 ans.",
        'pain' => [
            "Des bureaux surchauffes d'un cote et glacials de l'autre",
            "Une VMC sous-dimensionnee qui ne renouvelle plus l'air",
            "Un decret tertiaire a respecter sans savoir par quel bout commencer",
        ],
        'solutions' => [
            ['title' => 'Ventilation et desenfumage', 'text' => "VMC simple et double flux, extraction de locaux techniques et cuisines professionnelles, systemes de desenfumage conformes aux normes de securite incendie."],
            ['title' => 'Traitement d\'air', 'text' => "Centrales de traitement d'air, filtration, deshumidification et gestion de l'hygrometrie."],
            ['title' => 'Climatisation tertiaire', 'text' => "Groupes DRV, cassettes, gainables et rooftops pour bureaux, commerces et salles serveurs."],
            ['title' => 'Maintenance CVC', 'text' => "Contrats preventifs avec releve des performances, GMAO et astreinte sur les sites sensibles."],
        ],
        'bullets' => [
            "Etude aeraulique et note de calcul fournies avec le chiffrage",
            "Coordination avec les autres corps d'etat en chantier neuf",
            "Mise en service avec proces-verbal de reglage et de debits",
            "Contrats de maintenance preventive et corrective",
        ],
        'aide' => "Les operations CEE tertiaire (BAT-TH) financent une partie des travaux de remplacement d'equipements CVC. Nous identifions les fiches applicables a votre projet et valorisons les primes dans le chiffrage.",
        'faq' => [
            ['q' => "Intervenez-vous en chantier neuf comme en renovation ?", 'a' => "Les deux. En neuf nous travaillons a partir des plans et du CCTP, en renovation nous commencons par un releve sur site de l'existant et un diagnostic des installations en place."],
            ['q' => "Gerez-vous la maintenance apres installation ?", 'a' => "Oui, et c'est meme la norme sur nos affaires tertiaires. Le contrat couvre les visites preventives, le suivi reglementaire des fluides et les interventions curatives."],
            ['q' => "Pouvez-vous reprendre une installation posee par un autre ?", 'a' => "Oui. Nous realisons d'abord un audit de l'installation pour identifier les defauts de conception ou de reglage, puis nous proposons un plan de remise a niveau chiffre."],
            ['q' => "Quels delais sur un projet tertiaire ?", 'a' => "De quatre a douze semaines selon la puissance installee et les delais fournisseurs. Les groupes de forte puissance sont les postes les plus contraignants."],
        ],
    ],

    'panneaux-photovoltaiques' => [
        'slug' => 'panneaux-photovoltaiques',
        'photo' => 'images/services/photovoltaique.webp',
        'photo_alt' => 'Panneaux photovoltaiques poses par Climhero sur une toiture en Nord-Isere',
        'nav' => 'Photovoltaique',
        'title' => 'Panneaux photovoltaiques',
        'h1' => 'Installation de panneaux photovoltaiques en autoconsommation',
        'meta_title' => 'Installateur RGE QualiPV de panneaux solaires a Lyon et Nord-Isere | Climhero',
        'meta_description' => "Climhero etudie, installe et raccorde vos panneaux photovoltaiques en autoconsommation avec ou sans revente. Certifie RGE QualiPV, demarches Enedis et Consuel prises en charge.",
        'accent' => 'sun',
        'icon' => 'sun',
        'baseline' => "Produire son electricite plutot que de subir les hausses de tarif.",
        'intro' => "Le photovoltaique en autoconsommation est devenu rentable bien avant la fin de vie des panneaux, surtout pour un foyer equipe d'une pompe a chaleur, d'un ballon thermodynamique ou d'une voiture electrique. L'enjeu n'est pas de couvrir le toit, mais de dimensionner la production au plus pres de votre courbe de consommation reelle.",
        'pain' => [
            "Une facture d'electricite qui grimpe chaque annee sans rien changer chez vous",
            "Des demarcheurs qui promettent l'autonomie totale sans etude serieuse",
            "La crainte des demarches Enedis, Consuel et mairie",
        ],
        'solutions' => [
            ['title' => 'Autoconsommation simple', 'text' => "Vous consommez directement votre production. Le dimensionnement vise le taux d'autoconsommation le plus eleve possible."],
            ['title' => 'Autoconsommation avec revente', 'text' => "Le surplus est revendu a EDF OA sous contrat de 20 ans, avec prime a l'investissement versee sur 5 ans."],
            ['title' => 'Stockage sur batterie', 'text' => "Pour decaler la production du midi vers la consommation du soir. Etudie au cas par cas, uniquement quand c'est rentable."],
            ['title' => 'Couplage PAC et ballon', 'text' => "Le meilleur rendement economique : piloter la PAC et le ballon thermodynamique sur les heures de production solaire."],
        ],
        'bullets' => [
            "Etude de production calculee sur votre orientation, inclinaison et masques",
            "Panneaux et onduleurs garantis, avec garantie de production 25 ans",
            "Demarches mairie, Enedis, Consuel et EDF OA prises en charge",
            "Etancheite du toit reprise dans les regles, pas de bricolage",
        ],
        'aide' => "La prime a l'autoconsommation et la TVA reduite s'appliquent sur les installations realisees par un professionnel RGE QualiPV. Le contrat d'obligation d'achat EDF OA securise le tarif de rachat du surplus sur 20 ans.",
        'faq' => [
            ['q' => "Quelle production attendre en region lyonnaise ?", 'a' => "Comptez de l'ordre de 1 150 a 1 250 kWh par kWc installe et par an pour une toiture bien orientee au sud et peu ombragee. Notre etude precise le chiffre pour votre toiture."],
            ['q' => "Faut-il refaire la toiture avant de poser des panneaux ?", 'a' => "Si la couverture a plus de 30 ans ou presente des tuiles fragilisees, oui. Il serait absurde de deposer une installation dix ans plus tard pour refaire le toit. Nous le disons au moment de l'etude."],
            ['q' => "Combien de temps dure l'installation ?", 'a' => "Un a deux jours sur le toit pour une installation residentielle. Le delai global depend surtout du raccordement Enedis, qui prend en general de quatre a dix semaines."],
            ['q' => "Que se passe-t-il en cas de coupure de courant ?", 'a' => "Une installation classique se met en securite et s'arrete, pour proteger les agents du reseau. Seule une installation avec batterie et onduleur hybride permet de conserver une alimentation de secours."],
        ],
    ],

    'froid-commercial' => [
        'slug' => 'froid-commercial',
        'photo' => 'images/services/froid-commercial.webp',
        'photo_alt' => 'Chambre froide sur mesure installee par Climhero',
        'nav' => 'Froid commercial',
        'title' => 'Froid commercial',
        'h1' => 'Froid commercial et chambres froides sur mesure',
        'meta_title' => 'Installation et depannage de chambre froide a Lyon et Nord-Isere | Climhero',
        'meta_description' => "Chambres froides positives et negatives, vitrines refrigerees et laboratoires. Climhero installe, entretient et depanne votre froid commercial avec intervention rapide.",
        'accent' => 'ice',
        'icon' => 'box',
        'baseline' => "Une panne de froid, c'est du stock perdu. Notre metier, c'est que ca n'arrive pas.",
        'intro' => "Climhero prend en main toute installation frigorifique pour les entreprises de Charvieu-Chavagneux et des environs. Restaurants, boucheries, boulangeries, traiteurs, distribution alimentaire, pharmacies et laboratoires : la chaine du froid ne tolere aucune approximation. Depuis 25 ans nous concevons des solutions de stockage refrigere sur mesure, posons vitrines refrigerees et armoires conservatrices, et assurons la maintenance et le depannage. Nos frigoristes sont formes et certifies pour la manipulation des fluides frigorigenes.",
        'pain' => [
            "Une chambre froide qui ne tient plus sa temperature en pleine saison",
            "Des releves HACCP impossibles a justifier en cas de controle",
            "Un frigoriste injoignable le week-end, quand tout s'arrete",
        ],
        'solutions' => [
            ['title' => 'Chambres froides', 'text' => "Positives et negatives, montees sur mesure aux dimensions de votre local, avec groupe loge ou a distance."],
            ['title' => 'Vitrines et armoires', 'text' => "Vitrines refrigerees, armoires conservatrices, meubles muraux et tables refrigerees pour les metiers de bouche et la distribution alimentaire."],
            ['title' => 'Laboratoires et process', 'text' => "Salles de decoupe, laboratoires de patisserie, cellules de refroidissement rapide et locaux climatises de process."],
            ['title' => 'Maintenance et astreinte', 'text' => "Contrats avec visites preventives, controle d'etancheite reglementaire et intervention d'urgence."],
        ],
        'bullets' => [
            "Bilan frigorifique complet avant chiffrage, pas de catalogue standard",
            "Fluides conformes a la reglementation F-Gas et registre tenu a jour",
            "Enregistreurs de temperature et alarmes pour vos releves HACCP",
            "Intervention de depannage rapide sur toute la zone",
        ],
        'aide' => "Les fiches CEE dediees au froid commercial financent notamment les portes de meubles frigorifiques, les systemes de regulation et les groupes de production de froid performants. Nous les integrons au chiffrage.",
        'faq' => [
            ['q' => "Quel delai pour une intervention de depannage ?", 'a' => "Sous 48h en moyenne sur notre zone, et en priorite absolue pour les clients sous contrat de maintenance, qui beneficient d'un traitement prioritaire."],
            ['q' => "Assurez-vous le suivi reglementaire des fluides ?", 'a' => "Oui. Controle d'etancheite annuel obligatoire, tenue du registre, declaration des quantites et recuperation des fluides en fin de vie sont inclus dans nos contrats."],
            ['q' => "Pouvez-vous monter une chambre froide sur mesure ?", 'a' => "Oui, panneaux sandwich assembles sur site aux dimensions exactes de votre local, avec choix du sol, de la porte et du groupe adapte a la denree stockee."],
            ['q' => "Travaillez-vous avec les metiers de bouche ?", 'a' => "C'est une part importante de notre activite : restaurants, boulangeries, boucheries, traiteurs et supermarches de proximite sur le Nord-Isere et l'Est lyonnais."],
        ],
    ],

    'eau-chaude-sanitaire' => [
        'slug' => 'eau-chaude-sanitaire',
        'photo' => 'images/services/eau-chaude-sanitaire.webp',
        'photo_alt' => 'Chauffe-eau thermodynamique installe par Climhero',
        'nav' => 'Eau chaude sanitaire',
        'title' => 'Eau chaude sanitaire',
        'h1' => 'Production d\'eau chaude sanitaire performante',
        'meta_title' => 'Installation de chauffe-eau thermodynamique a Lyon et Nord-Isere | Climhero',
        'meta_description' => "Chauffe-eau thermodynamique, ballon solaire ou cumulus classique : Climhero dimensionne et installe votre production d'eau chaude sanitaire. Eligible aux aides pour le thermodynamique.",
        'accent' => 'aqua',
        'icon' => 'droplet',
        'baseline' => "Le deuxieme poste de depense energetique du logement, souvent le plus mal traite.",
        'intro' => "L'eau chaude sanitaire represente en moyenne 15 a 20 % de la facture energetique d'un foyer, davantage encore dans un logement recent bien isole. Passer d'un cumulus electrique classique a un chauffe-eau thermodynamique divise cette consommation par trois environ, pour un investissement modere et largement aide.",
        'pain' => [
            "Un cumulus qui ne tient plus une douche pour toute la famille",
            "Une facture d'electricite dopee par un ballon vetuste et entartre",
            "Une panne d'eau chaude un dimanche matin",
        ],
        'solutions' => [
            ['title' => 'Chauffe-eau thermodynamique', 'text' => "Une petite pompe a chaleur integree au ballon qui puise les calories de l'air. Trois fois moins d'electricite qu'un cumulus."],
            ['title' => 'Ballon solaire', 'text' => "Capteurs thermiques couples a un ballon a double echangeur. La solution la plus sobre quand la toiture s'y prete."],
            ['title' => 'Production par la PAC', 'text' => "Un ballon integre ou dedie alimente par votre pompe a chaleur air/eau. Un seul equipement pour le chauffage et l'eau chaude."],
            ['title' => 'Cumulus et depannage', 'text' => "Remplacement rapide de ballon electrique, detartrage, changement de resistance et de groupe de securite."],
        ],
        'bullets' => [
            "Volume calcule selon le nombre reel d'occupants et vos habitudes",
            "Attention portee au local d'installation, au bruit et a l'evacuation des condensats",
            "Reprise et evacuation de l'ancien ballon",
            "Reglage des plages horaires pour profiter des heures creuses ou du solaire",
        ],
        'aide' => "Le chauffe-eau thermodynamique et le chauffe-eau solaire individuel sont eligibles a MaPrimeRenov et aux primes CEE. Le cumulus electrique classique ne l'est pas, nous vous orientons donc vers la solution la plus pertinente.",
        'faq' => [
            ['q' => "Quel volume de ballon pour ma famille ?", 'a' => "Comptez environ 50 litres par adulte et 30 litres par enfant pour un ballon electrique, un peu plus pour un thermodynamique dont la remontee en temperature est plus lente."],
            ['q' => "Un chauffe-eau thermodynamique est-il bruyant ?", 'a' => "Il produit un bruit comparable a celui d'un refrigerateur, entre 35 et 45 dB selon les modeles. C'est pour cela qu'on ne l'installe pas contre la cloison d'une chambre."],
            ['q' => "Peut-on l'installer dans n'importe quelle piece ?", 'a' => "Il lui faut un volume d'air suffisant, en general 20 m3, ou un raccordement sur air exterieur. Un garage, une buanderie ou un cellier conviennent generalement bien."],
            ['q' => "Intervenez-vous en urgence sur une panne d'eau chaude ?", 'a' => "Oui, le remplacement d'un ballon hors service fait partie de nos interventions courantes, souvent realisable dans les jours qui suivent votre appel."],
        ],
    ],
];
