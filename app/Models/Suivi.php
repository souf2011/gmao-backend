<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    use HasFactory;

    protected $table = 'suivis';   // name of the table
    protected $primaryKey = 'id';  // primary key (auto increment by default)

    // ✅ Fields that can be mass-assigned
    protected $fillable = [
        'intervention_id',
        'intervenant_id',
        'dateSuivi',
        'intervenant',
        'tache',
        'nbHeures',
        'pourcentage',
    ];

    // ✅ Relationship: each Suivi belongs to one Intervention
    public function intervention()
    {
        return $this->belongsTo(Intervention::class, 'intervention_id');
    }


}

