<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompensationInfo extends Model
{

    protected $fillable = [
        'user_id','basic_salary', 'allowances', 'deductions', 'bank_account','salary_payment_duration','total_salary'
    ];

    protected $casts = [
        'allowances' => 'array',
        'deductions' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
