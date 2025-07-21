<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interventions extends Model
{
    use HasFactory;
    protected $table = 'interventions';
    protected $fillable = [
        'id',
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
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
