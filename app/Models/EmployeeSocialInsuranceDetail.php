<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSocialInsuranceDetail extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        'employee_id',
        'health_insurance_number',
        'pension_number',
        'my_number',
    ];
}
