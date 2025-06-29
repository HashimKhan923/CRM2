<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentManager extends Model
{
    use HasFactory;

    protected $fillable = ['department_id','manager_id'];
}
