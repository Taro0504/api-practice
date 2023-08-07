<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBankDetail extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        'employee_id',
        'bank_name',
        'bank_branch_name',
        'bank_account_type',
        'bank_account_number',
        'bank_account_holder_name',
    ];
}
