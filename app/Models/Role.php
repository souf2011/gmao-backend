<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id'; // or whatever your PK column is

    // If it's not an auto-incrementing integer:
    public $incrementing = true; // or false if not AI
    protected $keyType = 'int';
    protected $fillable = [
        'role',
        'role_label',
        'created_at',
        'updated_at',
    ];


    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }

}
