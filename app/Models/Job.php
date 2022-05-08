<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $table = 'job' ;
    protected $fillable = [
        'name',
        'position',
        'description',
        'benefit',
        'gender',
        'requirement',
        'number',
        'brief',
        'rank_id',
        'certificate_id',
        'field_id',
        'salary_id',
        'end_date'
    ];
}
