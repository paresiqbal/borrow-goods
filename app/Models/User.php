<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'position',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // A borrower (user) can have many loans
    public function loans()
    {
        return $this->hasMany(\App\Models\Loan::class, 'borrower_id');
    }
}
