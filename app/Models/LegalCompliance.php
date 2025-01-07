<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCompliance extends Model
{
    protected $fillable = [
        'user_id','ssn', 'work_authorization', 'tax_information', 'background_check'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
