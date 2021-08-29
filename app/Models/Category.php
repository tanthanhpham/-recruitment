<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'product_category';
    protected $fillable =[
        'name',
        'description',
        'p_category_id',
        'alias'
    ];

    // public function product(){
    //     return $this->hasMany('App\')
    // }
}
