<?php

namespace App\Http\Controllers;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $fields = Field::all();

        return view('admin.fields.index', compact('fields','user'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();

        return view('admin.fields.create',compact('user'));
    }
    public function store(Request $request){
        $user = Auth::guard('admin')->user();

        $validated_data = $request->validate([
            'name' => 'required',
        ]);

        $field = new Field();
        $field->name = $validated_data['name'];
        $field->save();

        return redirect()->route('field.index');
    }

    public function edit($id){
        $field = Field::find($id);
        $user = Auth::guard('admin')->user();
        return view('admin.fields.edit',compact('user','field'));
    }

    public function update(Request $request, $id){
        $field = Field::find($id);
        $validated_data = $request->validate([
            'name' => 'required',
        ]);
        $field->name = $validated_data['name'];
        $field->save();

        return redirect()->route('field.index');
    }

    public function delete($id){
        $field = Field::find($id)->delete();
        return redirect()->route('field.index');
    }
}
