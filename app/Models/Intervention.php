<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [

         'equipement',
         'responsable',
         'description',
         'date',
         'emplacement',
         'demandeur',
         'statut',
         'priorite',
         'etat',
         'type',
         'intervenant_id',
    ];
    public function intervenant()
    {
        return $this->belongsTo(User::class, 'intervenant_id');
    }
}
