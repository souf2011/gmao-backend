<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie_name',
        'categorie_description',
        'categorie_image'
    ];


    // public function products()
    // {
    //     return $this->hasMany(Products::class, 'categorie_id');
    // }

}
