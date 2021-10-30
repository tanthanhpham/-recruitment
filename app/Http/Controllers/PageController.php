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
use Illuminate\Support\Facades\DB;

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
        
        $products_id= DB::select('SELECT * FROM product WHERE product.category_id IN 
                                (SELECT cate.id FROM product_category as cate 
                                 WHERE (cate.p_category_id = ? ) OR (cate.id=?))',[$id,$id]);
       
        $product_id=[];
        for($i=0 ; $i < count($products_id) ; $i++){
            $product_id[$i] = [$products_id[$i]->id];
        }
        
        $products=Product::whereIn('id',$product_id)->paginate(12);

        // dd($products);
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
        ->paginate(12);
        $products->appends(['keyword' => $keyword]);
        return view('guest.product.index',compact('products','categories','brands'));
    }

    public function checkout(){
        return view('guest.transaction.checkout');
    }

    public function searchPrice(Request $request){
        $brands= Brand::all();
        $categories=Category::all();
        $min_price=$request->min_price;
        $max_price=$request->max_price;
        
        $products = Product::select('product.*')
        ->join('product_category', 'product_category.id', '=', 'product.category_id')
        ->join('product_price','product_price.product_id','=','product.id')
        ->where('product_price.price','>=',$min_price)->Where('product_price.price','<=',$max_price)
        ->paginate(12);
        // dd($products);
        // dd($min_price);
        $products->appends(['min_price' => $min_price,'max_price' => $max_price]);
        return view('guest.product.index',compact('products','categories','brands'));
    }
    public function home(){
        return view('guest.page.home');
    }

}
