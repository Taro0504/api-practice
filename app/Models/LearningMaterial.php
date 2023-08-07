<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningMaterial extends Model
{
    use HasFactory;

    // 更新許可する値
    protected $fillable = [
        'title',
        'description',
        'created_by',
        'media_type',
        'url',
    ];
}
