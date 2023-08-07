<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        
        'employee_position_id',
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'employment_date',
        'phone_number',
    ];
}
