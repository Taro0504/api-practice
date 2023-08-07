<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeFamily extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        'employee_id',
        'relationship',
        'family_member_name',
        'birth_date',
        'is_dependent',
    ];
    
}
