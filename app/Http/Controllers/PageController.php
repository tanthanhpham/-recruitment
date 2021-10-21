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
        $products=Product::paginate(12);
        // $products = Product::with(array('size'=> function ($query){ 
        //    $query->orderBy('product_price.price','desc'); 
        // }))->get();
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
        $products=Product::where('category_id',$id)->paginate(12);
        $category=Category::find($id);
        $categories=Category::all();
        $brands= Brand::all();
        return view('guest.page.index',compact('products','categories','category','brands'));
    }

    public function getBrand($id){
        $products=Product::where('brand_id',$id)->paginate(12);
        $categories=Category::all();
        $brands= Brand::all();
        return view('guest.page.index',compact('products','categories','brands'));
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
            // dd($newCart);
            $newCart->AddCart($product,$request->id,$id,$request->price,$request->size,$request->number);

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

    public function searchPrice(Request $request){
        $brands= Brand::all();
        $categories=Category::all();
        $products = Product::select('product.*')
        ->join('product_category', 'product_category.id', '=', 'product.category_id')
        ->join('product_price','product_price.product_id','=','product.id')
        ->where('product_price.price','>=',$request->min_price)->Where('product_price.price','<=',$request->max_price)
        ->paginate(8);
        // dd($products);
        return view('guest.page.index',compact('products','categories','brands'));
    }
    public function home(){
        return view('guest.page.home');
    }

    public function find($id){
        $product =Product::find($id);
        return view('guest.page.model-product',compact('product'));
    }
    
    public function addToCart(Request $request){
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
        return redirect()->route('guest.index');
    }
}
