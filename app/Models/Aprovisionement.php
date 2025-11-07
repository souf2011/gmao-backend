<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprovisionement extends Model
{
    use HasFactory;

    // Nom de la table (sinon Laravel suppose "aprovisionements")
    protected $table = 'aprovisionement';

    // Colonnes autorisées au remplissage
    protected $fillable = [
        'qte',
        'intervenant_id',
        'unite',
        'reference',
        'designation',
        'numeroDA',
        'statut',
        'bc',
    ];

    public function user()
    {
        // belongsTo(RelatedModel, foreign_key_in_this_table, owner_key_in_related_table)
        return $this->belongsTo(User::class, 'intervenant_id', 'user_id');
    }
}
