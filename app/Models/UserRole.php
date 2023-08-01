<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $casts = [
        'roles' => 'json',
    ];

    public function isAdmin()
    {
        return in_array('admin', $this->roles, true);
    }
}
