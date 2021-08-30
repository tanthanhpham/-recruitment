<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $brands=Brand::all();
        return view('admin.brand.index', compact('user','brands'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        return view('admin.brand.create', compact('user'));
    }

    public function store(Request $request){

        $data=$request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands',
            'image' => 'required|image'
        ]);
        $imagePath=$request->file('image')->store('images','public');
        $brand = new Brand();
      
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->image = $imagePath;
        $brand->save();

        return redirect('admin/brands')->with('success','Thêm thành công');
    }

    public function edit($id){
        $user = Auth::guard('admin')->user();
        $brand=Brand::find($id);

        return view('admin.brand.edit', compact('user','brand'));
    }

    public function update(Request $request,$id){
        $user = Auth::guard('admin')->user();
        $brand=Brand::find($id);

        $data=$request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image'
        ]);

        if($request->image){
            $imagePath=$request->file('image')->store('images','public');
            $brand->image = $imagePath;
        }
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->save();

        return redirect('admin/brands')->with('success','Cập nhật thành công');
    }

    public function delete($id){
        Brand::where('id',$id)->delete();
        // var_dump($id);exit();
        return redirect('admin/brands')->with('success','Xoá dữ liệu thành công');
    }
}
