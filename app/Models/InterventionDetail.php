<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterventionDetail extends Model
{
use HasFactory;

protected $fillable = [
'intervention_id',
'heures',
'materiel_utilise',
'remarques',
];

public function intervention()
{
return $this->belongsTo(Intervention::class);
}
}
