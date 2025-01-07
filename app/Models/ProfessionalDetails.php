<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDetails extends Model
{
    protected $fillable = [
        'user_id','employee_id', 'skills', 'qualifications', 'experience'
    ];
    protected $casts = [
        'skills' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
