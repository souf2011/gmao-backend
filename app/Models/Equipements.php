<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipements extends Model
{
    protected $table = 'equipements';
    protected $fillable = [
        'Equipement',
        'Categorie',
        'N_Serie',
        'Emplacement',
        'Compteur',
        'status',
        'Code_Equipement',
        'Categorie_Equipement',
        'Type_Moteur',
        'matricule',
        'Modele_Equipement',
        'Operateur',
        'Fin_Garantie',
        'Prix_Acquisition',
        'Date_Acquisition',
        'Prix_Location',
        'Prochaine_Vidange',
        'Nom_Fichier',
        'Commentaire',
    ];
    use HasFactory;
    public function maintenance()
    {
        return $this->hasMany(Maintenance::class,'equipement_id');
    }
    public function emplacements()
    {
        return $this->belongsTo(Emplacements::class, 'Emplacement_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categorie_id');
    }
}
