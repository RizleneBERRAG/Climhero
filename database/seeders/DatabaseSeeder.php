<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'contact@climhero.fr')],
            [
                'name' => 'Equipe Climhero',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'climhero2026')),
            ]
        );

        if (Lead::count() > 0) {
            return;
        }

        $samples = [
            ['Sandrine', 'Marchand', 'sandrine.marchand@example.com', '06 12 45 78 90', '69330', 'Meyzieu', 'pompe-a-chaleur', 'remplacement', 'maison', 'fioul', 'trois_mois', 'nouveau', "Chaudiere fioul de 2004, maison de 130 m2 avec radiateurs fonte. Je souhaite connaitre le montant des aides."],
            ['Laurent', 'Bruyere', 'l.bruyere@example.com', '07 88 12 33 41', '38300', 'Bourgoin-Jallieu', 'climatisation-reversible', 'installation', 'maison', 'electrique', 'urgent', 'contacte', "Trois chambres a l etage invivables l ete. Maison de 1974, combles perdus."],
            ['Restaurant', 'Le Cedre', 'contact@lecedre.example.com', '04 78 55 21 09', '69800', 'Saint-Priest', 'froid-commercial', 'depannage', 'local', 'aucun', 'urgent', 'devis', "Chambre froide positive qui ne descend plus sous 8 degres depuis hier soir."],
            ['Karim', 'Tazi', 'karim.tazi@example.com', '06 45 90 12 77', '69100', 'Villeurbanne', 'panneaux-photovoltaiques', 'installation', 'maison', 'gaz', 'six_mois', 'visite', "Toiture sud de 45 m2, consommation annuelle d environ 7 000 kWh avec une voiture electrique."],
            ['Nathalie', 'Ferrand', 'n.ferrand@example.com', '06 22 84 51 30', '38510', 'Charvieu-Chavagneux', 'eau-chaude-sanitaire', 'remplacement', 'maison', 'electrique', 'trois_mois', 'gagne', "Cumulus de 200 litres qui fuit. Interesse par un chauffe-eau thermodynamique."],
        ];

        foreach ($samples as $index => $row) {
            Lead::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'email' => $row[2],
                'phone' => $row[3],
                'postal_code' => $row[4],
                'city' => $row[5],
                'service' => $row[6],
                'project_type' => $row[7],
                'housing_type' => $row[8],
                'current_heating' => $row[9],
                'deadline' => $row[10],
                'status' => $row[11],
                'message' => $row[12],
                'profile' => $row[6] === 'froid-commercial' ? 'professionnel' : 'particulier',
                'consent' => true,
                'source' => 'formulaire',
                'ip' => '127.0.0.1',
                'created_at' => now()->subDays($index * 2 + 1),
                'updated_at' => now()->subDays($index * 2 + 1),
            ]);
        }
    }
}
