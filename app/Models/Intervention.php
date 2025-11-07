<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $table = 'interventions';
    protected $fillable = [

         'equipement_id',
         'responsable',
         'description',
         'date',
         'emplacement_id',
         'demandeur',
         'statut',
         'priorite',
         'etat',
         'type',
         'intervenant_id',
    ];
    public function intervenant()
    {
        return $this->belongsTo(User::class, 'intervenant_id', 'user_id');
    }
    public function suivis()
    {
        return $this->hasMany(Suivi::class, 'intervention_id');
    }

    public function emplacement()
    {
        return $this->belongsTo(Emplacements::class, 'emplacement_id');
    }

    public function equipement()
    {
        return $this->belongsTo(Equipements::class, 'equipement_id');
    }
    public function details()
    {
        return $this->hasOne(InterventionDetail::class);
    }

    public function aprovisionnements()
    {
        return $this->hasMany(Aprovisionnement::class);
    }
}
