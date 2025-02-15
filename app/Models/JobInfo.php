<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobInfo extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'designation',
        'date_of_hire',
        'employment_type',
        'work_location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function manager()
    {
        return $this->belongsTo(PersonalInfo::class,'manager_id','user_id');
    }
    use HasFactory;
}
