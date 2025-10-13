<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendenceRequest extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'reason', 'time_in', 'time_out', 'status','time_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
