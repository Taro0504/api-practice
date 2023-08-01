<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory,
        HasApiTokens,
        Notifiable;

    protected $fillable = [
        'user_name',
        'name_kana',
        'employee_position',
        'email',
        'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    
    public function userRole()
    {
        return $this->hasOne(UserRole::class);
    }
}


