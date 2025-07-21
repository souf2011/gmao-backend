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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->string("Code_Equipement")->unique();
            $table->string("Nom_Equipement");
            $table->string("N_Serie");
            $table->string("Marque");
            $table->unsignedBigInteger("Categorie_id");
            $table->unsignedBigInteger("Emplacement_id");
            $table->integer("Compteur")->nullable();
            $table->string("Status")->default("disponible");
            $table->string("Type_Moteur")->nullable();
            $table->string("Matricule")->nullable();
            $table->string("Modele_Equipement");
            $table->string("Operateur");
            $table->date("Fin_Garantie")->nullable();
            $table->decimal("Prix_Acquisition", 10, 2)->nullable();
            $table->date("Date_Acquisition")->nullable();
            $table->decimal("Prix_Location", 10, 2)->nullable();
            $table->date("Prochaine_Vidange")->nullable();
            $table->string("Nom_Fichier")->nullable();
            $table->text("Commentaire")->nullable();
            $table->string("Image_Equipement")->nullable();
            $table->timestamps();
            $table->foreign("Categorie_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("Emplacement_id")->references("id")->on("emplacements")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
