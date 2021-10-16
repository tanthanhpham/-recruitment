<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Cart;

use Session;

class PageController extends Controller
{
    public function index(){
        $products=Product::paginate(12);
        $categories=Category::all();
        $brands=Brand::all();
        return view('guest.page.index',compact('products','categories','brands'));
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

    public function getIdPrice(Request $request){
        $id=$request->get('id');
        $product=Product::find($id);
        foreach($product->size as $size){
            if($size->name == $request->size)
                echo $size->product_price->id;
        }
    }

    public function getCategory($id){
        $products=Product::where('category_id',$id)->paginate(8);
        $category=Category::find($id);
        $categories=Category::all();
        $brands= Brand::all();
        return view('guest.page.index',compact('products','categories','category','brands'));
    }

    public function search(Request $request){
        $keyword=$request->get('keyword');
        $brands= Brand::all();
        $categories=Category::all();

        $products = Product::select('product.*')
        ->join('product_category', 'product_category.id', '=', 'product.category_id')
        ->where('product_category.name','like','%'.$keyword.'%')->orWhere('product.name','like','%'.$keyword.'%')
        ->paginate(8);
       
        return view('guest.page.index',compact('products','categories','brands'));
    }

    public function cart(){
        return view('guest.page.cart');
    }
    public function addCart(Request $request,$id){
        $product =Product::find($id);
       
        if($product!=null){
            $oldCart= session('cart') ? session('cart') :null;
            $newCart= new Cart($oldCart);
            $newCart->AddCart($product,$request->id,$id,$request->price,$request->size);

            $request->session()->put('cart',$newCart);
        }
        // dd(session('cart'));
        return redirect()->route('guest.cart');
    }

    public function showCart(){
        $categories=Category::all();
        return view('guest.page.showCart',compact('categories'));
    }

    public function deleteCart(Request $req, $id){
        $categories=Category::all();
        $oldCart= session('cart') ? session('cart') :null;
        $newCart= new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0){
            $req->session()->put('cart',$newCart);
        }else{
            $req->session()->forget('cart');
        }
        return view('guest.page.deleteCart',compact('categories'));
    }

    public function updateItemCart(Request $req, $id){
        $categories=Category::all();
        $oldCart= session('cart') ? session('cart') :null;
        $newCart= new Cart($oldCart);
        $newCart->UpdateItemCart($id,$req->number,$req->price);
       
        $req->session()->put('cart',$newCart);

        return view('guest.page.deleteCart');
    }

    public function checkout(){

        return view('guest.page.checkout');
    }
}
