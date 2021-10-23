<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Size;

class ProductController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();
        $products=Product::paginate(7);
        $productprice=ProductPrice::all();
        return view('admin.product.index',compact('user','brands','categories','products','productprice'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        $brands= Brand::all();
        $categories=Category::all();
        return view('admin.product.create',compact('user','brands','categories'));
    }

    public function store(Request $request){
        
        $data=$request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'brand_id' => 'required',
            'category_id' => 'required',
            'discription' => 'required',
            'ingredient' => 'required',
            'direction' => 'required',
            'size' => 'required',
            'price' => 'required'
        ]);
        
        $size=$data['size'];
        $price=$data['price'];

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

        $insertedId = $product->id;
        // $temp = Product::find($insertedId);
        for($i=0; $i < count($size);$i++){
            $id=Size::where('name',$size[$i])->first();
            if(!isset($id)){
                $addsize=new Size();
                $addsize->name = $size[$i];
                $addsize->save();
                $id=$addsize->id;
            }

        }
        for ($i=0; $i <count($size);$i++) {
            $id=Size::where('name',$size[$i])->first()->id;
            $product_size[$i] = ([
                'price' => $price[$i],
                'product_id'=>$insertedId,
                'date_applied' =>now(),
                'size_id' =>$id,
            ]);
            // echo 'a';
        }
        $product->size()->attach($product_size);
       
        return redirect('admin/products')->with('success','Updated');
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

        $price=ProductPrice::where('product_id',$id)->get();

        return view('admin.product.show',compact('user','brands','categories','product','price'));
    }

    public function delete($id){
        $product=Product::find($id);
        $product->size()->detach();
        Product::where('id',$id)->delete();
        return redirect('admin/products')->with('success','Deleted');
    }

    public function update_price($id){
        $user = Auth::guard('admin')->user();
        $product=Product::find($id);

        return view('admin.product.update-price',compact('user','product'));
    }

    public function store_price($id,Request $request){
        $data=$request->validate([
            'size' => 'required',
            'price' => 'required'
        ]);
      
        $size=$data['size'];
        $price=$data['price'];
        
        for($i=0; $i < count($size);$i++){
            $idprice=Size::where('name',$size[$i])->first();
            if(!isset($idprice)){
                $addsize=new Size();
                $addsize->name = $size[$i];
                $addsize->save();
                $idprice=$addsize->id;
            }
        }
        
        $product=Product::find($id);
        for ($i=0; $i <count($size);$i++) {
            $idprice=Size::where('name',$size[$i])->first()->id;
            $product_size[$i] = ([
                'price' => $price[$i],
                'product_id'=>$product->id,
                'date_applied' =>now(),
                'size_id' =>$idprice,
            ]);
        }
        // dd($product_size);
        $product->size()->sync($product_size);
        return redirect('admin/products')->with('success','Updated');
    }

}
