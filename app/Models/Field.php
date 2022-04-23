<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'field' ;
    protected $fillable = ['name'];
    use HasFactory;
}
