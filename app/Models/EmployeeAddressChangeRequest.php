<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddressChangeRequest extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        'employee_id',
        'postal_code',
        'prefecture',
        'city',
        'address',
        'building',
    ];
}
