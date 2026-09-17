<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LegalController extends Controller
{
    public function mentions(): View
    {
        return view('pages.legal', [
            'metaTitle' => 'Mentions legales | Climhero',
            'metaDescription' => "Mentions legales du site Climhero, entreprise de genie climatique a Charvieu-Chavagneux.",
            'pageTitle' => 'Mentions legales',
            'blocks' => $this->mentionsBlocks(),
            'hideCta' => true,
        ]);
    }

    public function privacy(): View
    {
        return view('pages.legal', [
            'metaTitle' => 'Politique de confidentialite | Climhero',
            'metaDescription' => "Comment Climhero collecte, utilise et conserve les donnees transmises via le formulaire de demande de devis.",
            'pageTitle' => 'Politique de confidentialite',
            'blocks' => $this->privacyBlocks(),
            'hideCta' => true,
        ]);
    }

    private function mentionsBlocks(): array
    {
        $contact = config('climhero.contact');
        $brand = config('climhero.brand');

        return [
            ['title' => 'Editeur du site', 'text' => $brand['legal_name'] . ", " . $contact['street'] . ", " . $contact['postal_code'] . " " . $contact['city'] . ". Telephone : " . $contact['phone'] . ". Email : " . $contact['email'] . ". Numero SIRET, forme juridique, capital social et numero de TVA intracommunautaire a completer avant mise en ligne."],
            ['title' => 'Directeur de la publication', 'text' => "Le representant legal de " . $brand['legal_name'] . ". Nom a completer avant mise en ligne."],
            ['title' => 'Hebergement', 'text' => "Nom, raison sociale et adresse de l hebergeur a completer avant mise en ligne."],
            ['title' => 'Assurances professionnelles', 'text' => "L entreprise est couverte par une assurance de responsabilite civile professionnelle et une garantie decennale. Nom de l assureur et numero de police a completer avant mise en ligne."],
            ['title' => 'Certifications', 'text' => "RGE QualiPAC, RGE QualiPV, attestation de capacite a la manipulation des fluides frigorigenes. Les numeros et dates de validite peuvent etre communiques sur simple demande."],
            ['title' => 'Propriete intellectuelle', 'text' => "L ensemble des contenus de ce site, textes, visuels, logos et elements graphiques, est protege. Toute reproduction, meme partielle, est interdite sans autorisation ecrite prealable."],
            ['title' => 'Mediation de la consommation', 'text' => "Conformement au code de la consommation, tout consommateur peut recourir gratuitement a un mediateur de la consommation en vue de la resolution amiable d un litige. Coordonnees du mediateur a completer avant mise en ligne."],
        ];
    }

    private function privacyBlocks(): array
    {
        $contact = config('climhero.contact');

        return [
            ['title' => 'Responsable du traitement', 'text' => config('climhero.brand.legal_name') . ", " . $contact['street'] . ", " . $contact['postal_code'] . " " . $contact['city'] . ", joignable a l adresse " . $contact['email'] . "."],
            ['title' => 'Donnees collectees', 'text' => "Via le formulaire de demande de devis : nom, prenom, email, telephone, code postal, commune, nature du projet, type de logement, chauffage actuel, echeance et message libre. Sont egalement conservees l adresse IP et la page d origine de la demande, a des fins de securite et de lutte contre les envois automatises."],
            ['title' => 'Finalite', 'text' => "Ces donnees servent uniquement a traiter votre demande : vous rappeler, organiser la visite technique, etablir un devis et assurer le suivi commercial. Elles ne sont ni vendues, ni louees, ni transmises a des tiers a des fins de prospection."],
            ['title' => 'Base legale', 'text' => "Le traitement repose sur votre consentement, recueilli par la case a cocher du formulaire, et sur l execution de mesures precontractuelles prises a votre demande."],
            ['title' => 'Duree de conservation', 'text' => "Les demandes sans suite sont conservees trois ans a compter du dernier contact. Les dossiers ayant donne lieu a un devis ou a des travaux sont conserves pendant la duree legale applicable aux documents contractuels et comptables."],
            ['title' => 'Vos droits', 'text' => "Vous disposez d un droit d acces, de rectification, d effacement, de limitation, d opposition et de portabilite. Pour l exercer, ecrivez a " . $contact['email'] . ". Vous pouvez egalement introduire une reclamation aupres de la CNIL."],
            ['title' => 'Cookies', 'text' => "Ce site ne depose aucun cookie publicitaire ni de mesure d audience tierce. Seul un cookie technique de session, necessaire au fonctionnement du formulaire et a la protection contre la falsification de requetes, est utilise."],
        ];
    }
}
