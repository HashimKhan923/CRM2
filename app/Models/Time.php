<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{

    protected $fillable = ['user_id', 'time_in', 'time_out', 'status', 'late_status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class,'user_id','user_id');
    }

    public function breaks()
    {
        return $this->hasMany(Breaks::class, 'time_id');
    }


    use HasFactory;
}
