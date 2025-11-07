<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications'; // optional if table name is standard

    // Fillable fields for mass assignment
    protected $fillable = [
        'intervention_id',
        'user_id',      // admin who will receive the notification
        'message',      // notification message
        'type',         // optional type like 'new-user'
        'related_id',   // optional related user ID,      // timestamp when notification was read
        'read'
    ];

    // If you want timestamps to be auto-handled
    public $timestamps = true;

    // Optional: define relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
