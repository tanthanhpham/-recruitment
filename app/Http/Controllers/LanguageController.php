<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $languages = Language::all();
        return view('admin.languages.index', compact('languages','user'));
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();

        $validated_data = $request->validate([
            'name' => 'required',
        ]);

        $field = new Language();
        $field->name = $validated_data['name'];
        $field->save();

        return redirect()->route('language.index');
    }

    public function edit($id){
        $language = Language::find($id);
        $user = Auth::guard('admin')->user();
        return view('admin.languages.edit',compact('user','language'));
    }

    public function update(Request $request, $id){
        $language = Language::find($id);
        $validated_data = $request->validate([
            'name' => 'required',
        ]);
        $language->name = $validated_data['name'];
        $language->save();

        return redirect()->route('language.index');
    }

    public function delete($id){
        $language = Language::find($id)->delete();
        return redirect()->route('language.index');
    }

}
