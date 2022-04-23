<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $positions = Position::all();
        return view('admin.positions.index', compact('positions','user'));
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();

        $validated_data = $request->validate([
            'name' => 'required',
        ]);

        $position = new Position();
        $position->title = $validated_data['name'];
        $position->save();

        return redirect()->route('position.index');
    }

    public function edit($id){
        $position = Position::find($id);
        $user = Auth::guard('admin')->user();
        return view('admin.positions.edit',compact('user','position'));
    }

    public function update(Request $request, $id){
        $position = Position::find($id);
        $validated_data = $request->validate([
            'name' => 'required',
        ]);
        $position->title = $validated_data['name'];
        $position->save();

        return redirect()->route('position.index');
    }

    public function delete($id){
        $position = Position::find($id)->delete();
        return redirect()->route('position.index');
    }
}
