<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    protected $fillable = [
        'user_id','notes', 'preferences'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
