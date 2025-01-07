<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{

    protected $fillable = [
        'user_id',
        'work_email',
        'personal_email',
        'work_phone',
        'personal_phone',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
