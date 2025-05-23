<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipements extends Model
{
    protected $fillable = [
        'Code_Equipement',
        'Nom_Equipement',
        'Marque',
        'N_Serie',
        'Categorie_id',
        'Emplacement_id',
        'Compteur',
        'Status',
        'Type_Moteur',
        'Matricule',
        'Modele_Equipement',
        'Operateur',
        'Fin_Garantie',
        'Prix_Acquisition',
        'Date_Acquisition',
        'Prix_Location',
        'Prochaine_Vidange',
        'Nom_Fichier',
        'Commentaire',
        'Image_Equipement',
    ];
    use HasFactory;

    public function emplacements()
    {
        return $this->belongsTo(Emplacements::class, 'Emplacement_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categorie_id');
    }
}
