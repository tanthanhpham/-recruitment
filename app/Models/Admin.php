<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class Admin extends Model implements AuthenticatableContract
{
    use HasFactory; use Authenticatable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_active'
    ];

}
