<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenants extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom_intervenant',
        'Date_Naissance',
        'Telephone',
        'Email',
        'Genre',
        'Poste',
        'CIN',
        'DateEmbauche',
        'Service',
        'TypeFichier',
        'Image',
        'Fichier'
    ];
}
