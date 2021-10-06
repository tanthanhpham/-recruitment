<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

use Session;

class CartController extends Controller
{
    public function cart(){
        return view('guest.cart.index');
    }
    public function addCart(Request $request,$id){
        // $id = $request->id;
        $product =Product::find($id);
       
        if($product!=null){
            $oldCart= session('cart') ? session('cart') :null;
            $newCart= new Cart($oldCart);
            $newCart->AddCart($product,$id);
            $request->session()->put('cart', $newCart);
        }
        return redirect()->route('guest.cart');
       
    }
}
