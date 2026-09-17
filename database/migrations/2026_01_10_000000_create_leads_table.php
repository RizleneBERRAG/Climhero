<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            // Identite
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone', 40);

            // Localisation du chantier
            $table->string('postal_code', 10);
            $table->string('city')->nullable();

            // Qualification du projet
            $table->string('profile', 40)->default('particulier');   // particulier, professionnel, bailleur
            $table->string('service', 60)->nullable();               // slug de la prestation
            $table->string('project_type', 60)->nullable();          // installation, remplacement, depannage, entretien
            $table->string('housing_type', 40)->nullable();          // maison, appartement, local
            $table->string('current_heating', 40)->nullable();
            $table->string('deadline', 40)->nullable();              // urgent, 3 mois, 6 mois, information
            $table->text('message')->nullable();

            // Suivi commercial
            $table->string('status', 30)->default('nouveau');        // nouveau, contacte, visite, devis, gagne, perdu
            $table->text('internal_note')->nullable();
            $table->timestamp('contacted_at')->nullable();

            // Tracabilite
            $table->string('source', 60)->default('formulaire');
            $table->string('page')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->boolean('consent')->default(false);

            $table->timestamps();

            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
