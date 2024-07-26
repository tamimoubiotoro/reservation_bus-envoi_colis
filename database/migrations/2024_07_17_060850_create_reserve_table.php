<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('motdepass');
            $table->string('email');
            $table->string('sexe');
            $table->timestamps();
        });

        Schema::create('controleur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('motdepass');
            $table->string('email');
            $table->string('sexe');
            $table->timestamps();
        });

        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('motdepass');
            $table->string('email');
            $table->string('sexe');
            $table->timestamps();
        });

        Schema::create('administrateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('motdepass');
            $table->string('e-mail');
            $table->string('sexe');
            $table->timestamps();
        });

        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('dateReserv');
            $table->string('dateExpira');
            $table->timestamps();
        });

        Schema::create('facture', function (Blueprint $table) {
            $table->id();
            $table->integer('nbrFact');
            $table->double('montant');
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('envoi', function (Blueprint $table) {
            $table->id();
            $table->string('adressUtil');
            $table->string('adressDesti');
            $table->integer('nbrcolis');
            $table->timestamps();
        });

        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->float('poids');
            $table->string('contenu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
        Schema::dropIfExists('controleur');
        Schema::dropIfExists('agent');
        Schema::dropIfExists('administrateur');
        Schema::dropIfExists('reservation');
        Schema::dropIfExists('facture');
        Schema::dropIfExists('envoi');
        Schema::dropIfExists('colis');
    }
};
