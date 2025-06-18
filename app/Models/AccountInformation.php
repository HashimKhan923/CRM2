<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountInformation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','bank_name','routing_number','account_title','iban_number'];
}
