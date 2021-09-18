<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'product';
    protected $fillable =[
        'name',
        'category_id',
        'brand_id',
        'image',
        'ingredient',
        'direction',
        'discription'
    ];

    public function size()
    {
        return $this->belongsToMany('App\Models\Size','product_price',
            'product_id','size_id')->withPivot('price')->withTimestamps()->as('product_price');
    }
}
