<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Set the primary key explicitly because it's user_id not id
    protected $primaryKey = 'user_id';

    // If user_id is not auto-incrementing integer, set this false, but here it's AI so leave true
    public $incrementing = true;

    // If your primary key is bigint (integer), typecast to int is default, so no need to change
    protected $keyType = 'int';

    protected $fillable = [
        'role_id',
        'service_id',
        'etablissement_id',
        'first_name',
        'last_name',
        'address',
        'birthdate',
        'phone',
        'email',
        'password',
        'remember_token',
        'last_login',
        'confirmed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date',
        'last_login' => 'datetime',
        'password' => 'hashed',
    ];
    public function aprovisionnements()
    {
        return $this->hasMany(Aprovisionnement::class);
    }


    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function etablissement(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'user_id');
    }
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'intervenant_id', 'user_id');
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

