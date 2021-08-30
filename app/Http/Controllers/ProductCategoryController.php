<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductCategoryController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $category = Category::all();
        return view('admin.product_category.index', compact('user'),compact('category'));
        
        
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        $category = Category::all();
        return view('admin.product_category.create', compact('user'),compact('category'));
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();

        $data = $request->validate([
            'name' => 'required',
            'alias' => 'required|unique:product_category',
            'discription'=>'required',
            'p_category_id' => 'required'
        ]);
        // var_dump($data);exit();
        $category = new Category();
        $category->name=$data['name'];
        $category->discription=$data['discription'];
        $category->alias=$data['alias'];
        $category->p_category_id=$data['p_category_id'];
        $category->save();
        return redirect('admin/product_categories')->with('success','Thêm thành công');
    }

    public function edit($id){
        $user = Auth::guard('admin')->user();
        
        $data = Category::find($id);
        $category = Category::all(); 

        return view('admin.product_category.edit', compact('user','category','data'));
    }

    public function update(Request $request,$id){
        $user = Auth::guard('admin')->user();

        $data = $request->validate([
            'name' => 'required',
            'alias' => 'required',
            'discription'=>'required',
            'p_category_id' => 'required'
        ]);
        $category =  Category::find($id);
        $category->name=$data['name'];
        $category->discription=$data['discription'];
        $category->alias=$data['alias'];
        $category->p_category_id=$data['p_category_id'];
        $category->save();

        return redirect('admin/product_categories/')->with('success','Cập nhật dữ liệu thành công');
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        // var_dump($id);exit();
        return redirect('admin/product_categories/')->with('success','Xoá dữ liệu thành công');
    }

    
}
