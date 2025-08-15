<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $primaryKey = 'id'; // or whatever your PK column is
    protected $table = 'etablissements';
    // If it's not an auto-incrementing integer:
    public $incrementing = true; // or false if not AI
    protected $keyType = 'int';
    protected $fillable = [
        'nom_etablissement',
    ];


    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'etablissement_id','id');
    }



}

