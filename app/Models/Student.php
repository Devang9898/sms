<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city',
        'state',
        'date_of_birth',
        'gender',
        'course',
        'registration_number',
        'class',
        'division',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
