<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContactInfo extends Model
{
    protected $fillable = [
        'user_id','emergency_contact_name', 'emergency_contact_relationship', 'emergency_contact_phone', 'emergency_contact_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
