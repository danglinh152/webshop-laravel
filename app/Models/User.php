<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_first_name',
        'user_email',
        'google_id',
        'role',
    ];

    protected $hidden = [
        'user_password', // Đảm bảo rằng tên cột đúng
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_password' => 'hashed', // Sửa lại để khớp với tên cột
    ];
}
