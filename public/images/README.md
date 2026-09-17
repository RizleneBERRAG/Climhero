# Images du site

Les photos livrees avec le projet sont les photos de Climhero reprises du site
precedent. Vous pouvez les remplacer une par une par de vraies photos de
chantier plus recentes : il suffit d'ecraser le fichier au meme chemin. Tant
qu'un fichier est absent, le site retombe sur l'illustration technique
vectorielle correspondante. Aucune image cassee, jamais, et aucun bloc vide.

## Fichiers livres

Prestations - un visuel par metier. La meme photo sert a trois endroits :
la carte de l'accueil, le hero de la page prestation et la vignette
"Nos autres metiers" des cinq autres pages.

    images/services/climatisation.webp
    images/services/pompe-a-chaleur.webp
    images/services/genie-climatique.webp
    images/services/photovoltaique.webp
    images/services/froid-commercial.webp
    images/services/eau-chaude-sanitaire.webp

Les chemins sont definis dans `config/services_catalog.php`, cle `photo`.
Le texte alternatif se regle sur la cle `photo_alt` de la meme entree.

Pages generales :

    images/site/hero-large.webp          fond plein cadre du hero (2160 x 1010)
    images/site/hero-large-mobile.webp   version portrait, servie sous 760px
    images/site/hero-technicien.webp     photo d'origine (720 x 492), gardee
                                         pour la galerie de l'accueil

Les deux fichiers du hero ont ete reconstruits par super-echantillonnage
(reseau EDSR x3) a partir de la photo d'origine, qui ne fait que 720 px de
large sur l'ancien site. C'est le maximum exploitable a partir de cette
source : **des que Climhero fournit ses vraies photos de chantier en haute
definition, remplacez ces deux fichiers**, c'est le gain de qualite le plus
visible du site. Format attendu : 2400 x 1100 minimum pour le fichier large,
1400 x 1150 pour la version mobile.

La galerie "Nos realisations" de l'accueil est declaree dans un tableau
`$gallery` en tete de la section REALISATIONS de
`resources/views/pages/home.blade.php` : fichier, legende, commune et taille de
vignette (`lg` pour la grande, `sm` pour les autres). Elle reutilise la photo du
hero et les six photos de prestations. Une entree dont le fichier n'existe pas
est simplement ignoree.

Logos de certification :

    images/labels/rge-qualipac.webp
    images/labels/manipulateur-fluides.webp
    images/labels/bureau-veritas.webp

Ils sont declares dans `config/climhero.php`, cle `logo` de chaque entree de
`certifications`. La cle est **optionnelle** : sans logo, la pastille bleue a
bouclier prend le relais. Pour ajouter le logo QualiPV ou celui de votre
assureur, deposez le fichier dans `images/labels/` et ajoutez la cle.

## Formats

Tous les fichiers sont en WebP, format supporte par tous les navigateurs a jour
(Chrome, Edge, Firefox, Safari 14+). Ils pesent entre 5 et 18 Ko chacun, ce qui
est l'essentiel de la performance de la page. Si vous devez viser un parc de
navigateurs tres ancien, exportez vos photos en JPEG et changez l'extension
dans `config/services_catalog.php`.

## Recommandations pour vos propres photos

- Format 16/9, 1600 x 900 px minimum a l'export, puis compression WebP.
- Viser moins de 150 Ko par image apres compression.
- De vraies photos de chantier Climhero valent mieux que n'importe quelle
  banque d'images : c'est le premier facteur de confiance sur un site
  d'artisan, et cela differencie immediatement des concurrents.
- Cadrer sur l'equipement pose ou sur le geste technique, pas sur le ciel.
- Si une photo n'est pas de Climhero, ne pas la decrire comme une realisation
  de l'entreprise dans le texte alternatif.

## Logo

    images/logo-climhero.svg     version autonome (partenaires, signatures mail)
    ../favicon.svg               favicon

Dans les pages, le logo est un composant Blade vectoriel
(`resources/views/components/logo.blade.php`) : il reste net a toutes les
tailles et ses couleurs suivent le theme clair ou sombre.
