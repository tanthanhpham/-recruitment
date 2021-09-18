<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $products=Product::paginate(8);
        $categories=Category::all();
        return view('guest.page.index',compact('products','categories'));
    }

    public function show($id){
        $product=Product::find($id);
        $brands= Brand::all();
        $categories=Category::all();
        return view('guest.page.show',compact('product','brands','categories'));
    }

    public function getPrice(Request $request){
        $id=$request->get('id');
        $product=Product::find($id);
        foreach($product->size as $size){
            if($size->name == $request->size)
                echo $size->product_price->price;
        }
    }

    public function getCategory($id){
        $products=Product::where('category_id',$id)->paginate(8);;
        $categories=Category::all();
        return view('guest.page.search',compact('products','categories'));
    }
}