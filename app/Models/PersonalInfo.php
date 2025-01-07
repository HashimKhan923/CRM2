<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $fillable = [
        'user_id','first_name','last_name', 'date_of_birth', 'gender', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    use HasFactory;
}
