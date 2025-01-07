<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthSafetyInfo extends Model
{
    protected $fillable = [
        'user_id','health_insurance', 'allergies'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
