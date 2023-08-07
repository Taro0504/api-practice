<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLearningStatus extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        'employee_id',
        'learning_material_id',
        'progress_rate',
        'learning_time',
    ];
}
