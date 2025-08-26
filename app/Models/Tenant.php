<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'database_name',
        'database_username',
        'database_password',
        'phone_number',
        'company_name',
        'company_logo',
        'website_url',
        'stripe_customer_id'
    ];

    use HasFactory;
}
