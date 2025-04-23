<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens; // Passport trait for API auth

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'email',
        'role',
    ];

    protected $hidden = [
        'remember_token',
    ];

    // Relation to student
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // Relation to admin
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
