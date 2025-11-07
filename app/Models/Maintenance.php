<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance_history';

    protected $fillable = [
        'equipement_id',
        'type',
        'last_values', // km or date
        'lifespan'
    ];

    /**
     * Define relation with Equipment
     */
    public function equipment()
    {
        return $this->belongsTo(Equipements::class, 'equipement_id');
    }
}

