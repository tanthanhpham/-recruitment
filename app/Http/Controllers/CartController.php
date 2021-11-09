<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductPrice;


use Session;

class CartController extends Controller
{
    public function index(){
        return view('guest.cart.index');
    }

    public function create(Request $request,$id){
        $product =Product::find($id);
        
        if($product!=null){
            $oldCart= session('cart') ? session('cart') :null;
            $newCart= new Cart($oldCart);
            // dd($newCart);
            $newCart->AddCart($product,$request->id,$id,$request->price,$request->size,$request->number);

            $request->session()->put('cart',$newCart);
        }
        // dd(session('cart'));
        return redirect()->route('cart.index');
    }

    public function delete(Request $req, $id){
        $categories=Category::all();
        $oldCart= session('cart') ? session('cart') :null;
        $newCart= new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0){
            $req->session()->put('cart',$newCart);
        }else{
            $req->session()->forget('cart');
        }
        return view('guest.cart.update',compact('categories'));
    }

    
    public function update(Request $req, $id){
        $categories=Category::all();
        $oldCart= session('cart') ? session('cart') :null;
        $newCart= new Cart($oldCart);
        $newCart->UpdateItemCart($id,$req->number,$req->price);
       
        $req->session()->put('cart',$newCart);

        return view('guest.cart.update');
    }

    public function add(Request $request){
        $product_price = ProductPrice::select('product_price.*')
        ->where('product_price.size_id','=',$request->size)->where('product_price.product_id','=',$request->product_id)
        ->first();

        $product =Product::find($request->product_id);
        $size=Size::find($request->size);

        // dd($product_price->id);
        if($product!=null){
            $oldCart= session('cart') ? session('cart') :null;
            $newCart= new Cart($oldCart);
            // dd($newCart);
            $newCart->AddCart($product,$product_price->id,$request->product_id,$product_price->price,$size->name,1);

            $request->session()->put('cart',$newCart);
        }
        // dd(session('cart'));
        return redirect()->route('shop.index');
    }

    public function show(){
        $categories=Category::all();
        return view('guest.cart.show',compact('categories'));
    }
}
