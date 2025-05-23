<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emplacements extends Model
{
    protected $fillable = [
        'nom_emplacement',
        'description',
        'address',
        'latitude',
        'longitude'
    ];
}
