<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table= 'product_price';
    protected $fillable =[
        'size_id',
        'product_id',
        'price',
        'date_applied'
    ];
}
