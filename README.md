# Climhero

Site vitrine et back-office de captation des demandes de devis pour Climhero,
entreprise de genie climatique basee a Charvieu-Chavagneux (38510).

Laravel 12, architecture MVC classique, Blade sans framework CSS.
**Une feuille de style et un script dedies par page**, charges depuis `public/`.
Pas de Tailwind, pas de build Vite a lancer pour travailler sur le front.

---

## Demarrage dans PhpStorm

```bash
composer install
composer setup
php artisan serve
```

`composer setup` cree le `.env`, genere la cle applicative, cree la base SQLite,
lance les migrations et le seeder. Sous Windows / PowerShell, la commande est
identique.

Si vous preferez faire les etapes une par une :

```bash
composer install
copy .env.example .env        # cp sur macOS et Linux
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### Erreur 500 au premier lancement

Dans 99 % des cas il manque le fichier `.env` ou la cle applicative.
Lancez `composer setup`, puis rechargez la page.
Si l'erreur persiste, mettez `APP_DEBUG=true` dans `.env`, rechargez, et lisez
le message. Le detail complet est toujours dans `storage/logs/laravel.log`.

Le site fonctionne sans base de donnees : sessions et cache sont en driver
`file`. La base n'est necessaire que pour enregistrer les demandes de devis et
pour le back-office.

Le site est alors sur http://localhost:8000
Le back-office sur http://localhost:8000/admin/connexion

Identifiants crees par le seeder (a changer dans `.env` avant toute mise en ligne) :

```
ADMIN_EMAIL=contact@climhero.fr
ADMIN_PASSWORD=climhero2026
```

`npm install` et `npm run build` ne sont **pas** necessaires : le CSS et le JS
sont servis directement depuis `public/`, avec un cache-buster base sur la date
de modification du fichier (helper `climhero_asset()`).

---

## Architecture

```
app/
  Http/Controllers/
    HomeController.php          accueil
    ServiceController.php       les 6 pages prestations
    ContactController.php       formulaire de devis et enregistrement du lead
    LegalController.php         mentions legales, confidentialite
    SitemapController.php       plan du site, sitemap.xml, robots.txt
    Admin/AuthController.php    connexion au back-office
    Admin/LeadController.php    liste, detail, statut, export CSV
  Http/Requests/LeadRequest.php validation + anti-spam
  Mail/LeadReceived.php         notification interne
  Models/Lead.php               demande de devis
  Support/helpers.php           climhero_asset(), schemas JSON-LD

config/
  climhero.php                  coordonnees, preuves, zones, avis, process, FAQ
  services_catalog.php          contenu des 6 prestations (source unique)
  aides.php                     bareme indicatif MaPrimeRenov / CEE du simulateur

resources/views/
  layouts/app.blade.php         gabarit public
  partials/                     header, footer, bandeau CTA, barre mobile
  components/icon.blade.php     jeu d'icones SVG inline
  pages/                        home, contact, legal, plan du site
  services/                     une vue par prestation + partials communs
  admin/                        back-office
  emails/                       notification de nouvelle demande

public/
  css/base.css                  design system global
  css/pages/{slug}.css          une feuille par page
  css/admin.css                 back-office
  js/base.js                    header, menu, reveal, compteurs, accordeons
  js/pages/home.js              thermostat du hero + simulateur d'aides
  js/pages/contact.js           formulaire de devis en 3 etapes
```

### Ou se modifie le contenu

Tout le contenu editorial est dans `config/`, pas dans les vues.
Ajouter une prestation, changer un prix, corriger un texte de FAQ ou une ville
de la zone d'intervention se fait dans `config/climhero.php` ou
`config/services_catalog.php`, sans toucher au HTML.

Pour ajouter une prestation :

1. ajouter l'entree dans `config/services_catalog.php` ;
2. creer `resources/views/services/{slug}.blade.php` (copier une existante) ;
3. creer `public/css/pages/{slug}.css`.

La route, le menu, le footer, le plan du site, le sitemap XML et le selecteur du
formulaire de contact se mettent a jour automatiquement.

---

## Le simulateur d'aides

Le bareme vit dans `config/aides.php` et est injecte en JSON dans la page.
Les montants MaPrimeRenov et CEE evoluent chaque annee : **c'est le seul fichier
a mettre a jour**, le front suit.

Les resultats sont affiches en fourchettes, avec une mention explicite
d'estimation non contractuelle. Ne pas presenter ces montants comme un
engagement commercial.

---

## Captation des leads

- Le formulaire de contact fonctionne **sans JavaScript** (les trois etapes
  s'affichent alors a la suite). Le decoupage en etapes est une amelioration
  progressive posee par `contact.js`.
- Validation serveur dans `app/Http/Requests/LeadRequest.php`.
- Anti-spam : champ piege (honeypot) + controle du temps de remplissage +
  limitation a 8 envois par minute et par IP.
- Chaque demande est enregistree en base **avant** l'envoi du mail : une panne
  SMTP ne fait jamais perdre un lead, elle est seulement journalisee.
- Notification envoyee a l'adresse definie par `CLIMHERO_LEAD_INBOX`.
  En local, `MAIL_MAILER=log` ecrit le mail dans `storage/logs/laravel.log`.

Back-office : filtres par statut, recherche, fiche detaillee, note interne,
suivi du statut commercial et export CSV compatible Excel.

---

## SEO

- Metas et canonical par page, definies dans les controleurs.
- JSON-LD `HVACBusiness` sur toutes les pages, `FAQPage` sur l'accueil et sur
  chaque prestation.
- `/sitemap.xml` et `/robots.txt` generes dynamiquement, `/admin` exclu.
- Structure Hn propre, un seul H1 par page, fil d'ariane sur les prestations.
- Contenu local explicite : communes du Nord-Isere, de l'Est lyonnais et de Lyon.

---

## Avant la mise en ligne

1. Completer `LegalController` : SIRET, forme juridique, capital, TVA,
   directeur de publication, hebergeur, assurances, mediateur de la
   consommation. Les emplacements sont marques dans le fichier.
2. Verifier les numeros et dates de validite des certifications RGE.
3. Remplacer les avis clients de `config/climhero.php` par de vrais avis
   (avec accord des clients), ou brancher les avis Google.
4. Changer `ADMIN_EMAIL` et `ADMIN_PASSWORD`, configurer le SMTP reel.
5. Mettre `APP_DEBUG=false` et `APP_ENV=production`.
6. Les photos livrees sont celles du site precedent. Les remplacer par des
   prises de vue recentes de vos chantiers est le poste qui ameliore le plus
   la conversion sur un site d'artisan. Voir `public/images/README.md`.
7. Relire le bareme de `config/aides.php` a la date de mise en ligne.

## Identite visuelle

Le logo officiel du client a ete vectorise a partir du fichier d'origine : la
flamme rouge et le flocon bleu forment une seule marque coupee en son milieu.
Il n'est donc pas livre en bitmap, mais en SVG :

- `resources/views/components/logo.blade.php` : composant Blade utilise dans le
  header, le footer et le back-office. Les deux formes sont des aplats remplis
  en CSS (`.logo__flame`, `.logo__flake`), ce qui permet d'eclaircir le flocon
  sur fond sombre sans dupliquer de fichier.
- `public/images/logo-climhero.svg` : version autonome pour les partenaires,
  les signatures mail et les annuaires.
- `public/favicon.svg` : favicon, flamme et flocon sur fond bleu nuit.

Couleurs officielles, reprises comme base du design system :

    Flamme  #FE001B      declinaisons chaudes : #B30D17 #E4121F #FF4B52
    Flocon  #0077BA      declinaisons froides : #005B91 #0077BA #2FA3DE
    Flocon clair  #72B4F8  (sur fond sombre uniquement)

## Illustrations et photos

Le site est livre avec les photos de Climhero reprises du site precedent :
un visuel par prestation, la photo d'intervention du hero de l'accueil, la
galerie "Nos realisations" et les logos de certification. Tous les fichiers
sont en WebP, entre 3 et 18 Ko chacun.

    public/images/services/*        un visuel par prestation
    public/images/site/*            photo du hero de l'accueil
    public/images/labels/*          logos RGE QualiPAC, fluides, Bureau Veritas

Pour les remplacer par de vraies photos de chantier, ecrasez simplement le
fichier au meme chemin. Le detail des chemins, des legendes et des formats est
dans `public/images/README.md`. Les chemins des prestations sont definis dans
`config/services_catalog.php`, cle `photo` ; la galerie de l'accueil dans le
tableau `$gallery` en tete de la section REALISATIONS de
`resources/views/pages/home.blade.php` ; les logos de certification dans
`config/climhero.php`, cle `logo` (optionnelle) de chaque certification.

Si un fichier est absent, la prestation retombe automatiquement sur une
illustration technique vectorielle maison
(`resources/views/components/scene.blade.php`), indexee sur l'accent de la
prestation, et les vignettes de galerie manquantes sont simplement ignorees.
Aucune image cassee, aucun bloc vide.

## Accessibilite et performance

- Contrastes verifies sur les fonds sombres et clairs.
- Navigation clavier, `:focus-visible` visible partout, lien d'evitement.
- `prefers-reduced-motion` respecte : toutes les animations sont neutralisees.
- Aucune librairie JS externe, aucune image lourde, CSS decoupe par page.
- Les polices sont chargees depuis Google Fonts. Pour un site 100 % autonome,
  les heberger dans `public/fonts/` et remplacer le `<link>` du layout.
