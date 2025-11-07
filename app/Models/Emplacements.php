<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Emplacements extends Model
{
    use HasFactory;
    protected  $table = 'emplacements';


    protected $fillable = [
        'nom_emplacement',
        'description',
        'address',
        'latitude',
        'longitude'
    ];
    public $timestamps = false;



}
