<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Size;
use App\Models\ProductPrice;
use PhpParser\Node\Expr\FuncCall;
use Session;

class PageController extends Controller
{
    public function index(){
        $products=Product::orderBy('id', 'desc')->get();
        // dd($products);
        $categories=Category::all();
        $brands=Brand::all();
        return view('guest.page.index',compact('products','categories','brands'));
    }



    public function getPrice(Request $request){
        $id=$request->get('id');
        $product=Product::find($id);
        foreach($product->size as $size){
            if($size->name == $request->size)
                echo $size->product_price->price;
        }
    }

    public function getIdPrice(Request $request){
        $id=$request->get('id');
        $product=Product::find($id);
        foreach($product->size as $size){
            if($size->name == $request->size)
                echo $size->product_price->id;
        }
    }

    public function getCategory($id){
        $products=Product::where('category_id',$id)->paginate(12);
        $category=Category::find($id);
        $categories=Category::all();
        $brands= Brand::all();
        return view('guest.product.index',compact('products','categories','category','brands'));
    }

    public function getBrand($id){
        $products=Product::where('brand_id',$id)->paginate(12);
        $categories=Category::all();
        $brands= Brand::all();
        return view('guest.product.index',compact('products','categories','brands'));
    }

    public function search(Request $request){
        $keyword=$request->get('keyword');
        $brands= Brand::all();
        $categories=Category::all();

        $products = Product::select('product.*')
        ->join('product_category', 'product_category.id', '=', 'product.category_id')
        ->where('product_category.name','like','%'.$keyword.'%')->orWhere('product.name','like','%'.$keyword.'%')
        ->get();
       
        return view('guest.product.index',compact('products','categories','brands'));
    }

    public function checkout(){
        return view('guest.transaction.checkout');
    }

    public function searchPrice(Request $request){
        $brands= Brand::all();
        $categories=Category::all();
        $products = Product::select('product.*')
        ->join('product_category', 'product_category.id', '=', 'product.category_id')
        ->join('product_price','product_price.product_id','=','product.id')
        ->where('product_price.price','>=',$request->min_price)->Where('product_price.price','<=',$request->max_price)
        ->get();
        // dd($products);
        return view('guest.product.index',compact('products','categories','brands'));
    }
    public function home(){
        return view('guest.page.home');
    }

}
