<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocumantion extends Model
{
    protected $casts = [
        'documents' => 'array',
    ];
    use HasFactory;
}
