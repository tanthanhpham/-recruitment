<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Employer extends Model implements AuthenticatableContract
{

    use HasFactory;use Authenticatable;
    protected $table = 'employer';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'address',
        'password'
    ];
}
