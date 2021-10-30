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

    public function parent() {
        return $this->belongsTo(Category::class, 'p_category_id');
    }
    
    public function childs() {
        return $this->hasMany(Category::class, 'p_category_id');
    }
 
    public function products() {
        return $this->hasManyThrough(Product::class, Category::class, 'p_category_id', 'category_id', 'id');
    }
}
