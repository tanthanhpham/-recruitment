<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $salaries = Salary::all();
        return view('admin.salaries.index', compact('salaries','user'));
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();

        $validated_data = $request->validate([
            'lower_limit' => 'required',
            'upper_limit' => 'required'
        ]);

        $salary= new Salary();
        $salary->lower_limit = $validated_data['lower_limit'];
        $salary->upper_limit = $validated_data['upper_limit'];
        $salary->save();

        return redirect()->route('salary.index');
    }

    public function edit($id){
        $salary = Salary::find($id);
        $user = Auth::guard('admin')->user();
        return view('admin.salaries.edit',compact('user','salary'));
    }

    public function update(Request $request, $id){
        $user = Auth::guard('admin')->user();

        $validated_data = $request->validate([
            'lower_limit' => 'required',
            'upper_limit' => 'required'
        ]);

        $salary= Salary::find($id);
        $salary->lower_limit = $validated_data['lower_limit'];
        $salary->upper_limit = $validated_data['upper_limit'];
        $salary->save();

        return redirect()->route('salary.index');
    }

    public function delete($id){
        $salary = Salary::find($id)->delete();
        return redirect()->route('salary.index');
    }
}
