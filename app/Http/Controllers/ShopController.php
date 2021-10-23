<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(){
        $products=Product::paginate(12);
        // $products = Product::with(array('size'=> function ($query){ 
        //    $query->orderBy('product_price.price','desc'); 
        // }))->get();
        $categories=Category::all();
        $brands=Brand::all();
        return view('guest.product.index',compact('products','categories','brands'));
    }

    public function show($id){
        $product=Product::find($id);
        $brands= Brand::all();
        $categories=Category::all();
        return view('guest.product.show',compact('product','brands','categories'));
    }

    public function find($id){
        $product =Product::find($id);
        return view('guest.product.model-product',compact('product'));
    }
}
