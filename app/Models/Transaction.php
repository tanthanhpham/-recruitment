<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'transactions';
    protected $fillable =[
        'name',
        'address',
        'phone_number',
        'total',
        'discount',
        'status',
    ];
    public function orders()
    {
        return $this->belongsToMany('App\Models\ProductPrice','orders',
            'trans_id','product_price_id')->withPivot('id','number')->withTimestamps()->as('orders');
    }

}
