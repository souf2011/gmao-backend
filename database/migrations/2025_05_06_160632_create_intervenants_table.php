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
        Schema::create('intervenants', function (Blueprint $table) {
            $table->id();
            $table->string("Nom_intervenant");
            $table->date("Date_Naissance")->nullable();
            $table->string("Telephone");
            $table->string("Email")->nullable();
            $table->enum("Genre", ["Homme", "Femme"])->nullable();
            $table->string("Poste");
            $table->string("CIN")->nullable();
            $table->date("DateEmbauche")->nullable();
            $table->string("Service");
            $table->string("TypeFichier")->nullable();
            $table->string("Image")->nullable();
            $table->string("Fichier")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervenants');
    }
};
