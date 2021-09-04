<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductPrice;
use Validator;

class ProductController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();
        $products=Product::all();
        return view('admin.product.index',compact('user','brands','categories','products'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();
        return view('admin.product.create',compact('user','brands','categories'));
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();

        $data=$request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'brand_id' => 'required',
            'category_id' => 'required',
            'discription' => 'required',
            'ingredient' => 'required',
            'direction' => 'required',
        ]);
        $imagePath=$request->file('image')->store('images','public');
        $product = new Product();
        
        $product->name = $data['name'];
        $product->brand_id = $data['brand_id'];
        $product->category_id = $data['category_id'];
        $product->discription = $data['discription'];
        $product->direction = $data['direction'];
        $product->ingredient = $data['ingredient'];
        $product->image = $imagePath;
        $product->save();

        return redirect('admin/products/price')->with('success','Added');
    }

    public function edit($id){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();

        $product=Product::find($id);
        return view('admin.product.edit',compact('user','brands','categories','product'));
    }

    public function update($id ,Request $request){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();

        $data=$request->validate([
            'name' => 'required',
            'image' => 'image',
            'brand_id' => 'required',
            'category_id' => 'required',
            'discription' => 'required',
            'ingredient' => 'required',
            'direction' => 'required',
        ]);

        $product = Product::find($id);
        if($request->image){
            $imagePath=$request->file('image')->store('images','public');
            $product->image = $imagePath;
        }
        
        
        $product->name = $data['name'];
        $product->brand_id = $data['brand_id'];
        $product->category_id = $data['category_id'];
        $product->discription = $data['discription'];
        $product->direction = $data['direction'];
        $product->ingredient = $data['ingredient'];
        $product->save();

        return redirect('admin/products')->with('success','Updated');
    }

    public function show($id){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();

        $product=Product::find($id);
        return view('admin.product.show',compact('user','brands','categories','product'));
    }

    public function delete($id){
        Product::where('id',$id)->delete();
        return redirect('admin/products')->with('success','Deleted');
    }

    public function price($id){
        // if($request->ajax()){
        //     $rules=array(
        //         'size.*' =>'required',
        //         'price.*'=>'required'
        //     );
        //     $error = Validator::make($request->all(),$rules);
        //     if($error->fails()){
        //         return response()->json([
        //             'error' => $error->errors()->all()
        //         ]);
        //     }

        //     $size=$request->size;
        //     $price=$request->price;

        //     $prosize = new Size();
        //     $proprice = new ProductPrice();

        //     for($count=0;$count < count($size);$count++){
        //         $prosize->name=$size[$count];
        //         $proprice->sizeid=$size[$count];
        //         $proprice->product_id=$product[$id];
        //     }
        // }

    }
}
