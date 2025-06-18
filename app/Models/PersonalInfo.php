<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $fillable = [
        'user_id','first_name','middle_name','last_name','national_id','nationality','blood_group','martial_status','date_of_birth', 'gender', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    use HasFactory;
}
