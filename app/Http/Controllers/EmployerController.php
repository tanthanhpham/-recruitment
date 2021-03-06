<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index(){
        if (Auth::guard('employer')->check()) {
            $employer = Auth::guard('employer')->user();
            $check = true;
            return redirect()->route('job.index');
        }else {
            $check = false;
            return view('employer.user.index', compact('check'));
        }
    }

    public function create(){

        return view('employer.user.register');
    }

    public function store(Request $request){
        $validated_data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:employer',
            'email' => 'required|email|unique:employer',
            'password' => 'required',
            'address' => 'required',
            'company' => 'required'
        ]);

        $validated_data['password'] = Hash::make($request->password);

        $employer = new Employer();
        $employer->name = $validated_data['name'];
        $employer->phone = $validated_data['phone'];
        $employer->email = $validated_data['email'];
        $employer->address = $validated_data['address'];
        $employer->company = $validated_data['company'];
        $employer->password = $validated_data['password'];
        $employer->role = 'employer';

        $employer->save();
        return redirect()->route('employer.login');
    }

    public function signin(){

        return view('employer.user.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');
        if (Auth::guard('employer')->attempt($credentials)) {
            $employer = Auth::guard('employer')->user();
            if ($employer->role == 'employer'){
                return redirect()->route('employer.index');
            }

            return redirect()->route('employer.signin');
        }else {

            return redirect()->route('employer.signin');
        };
    }

    public function logout(){
        Auth::guard('employer')->logout();

        return redirect('employer/');
    }

    public function show($id){
        $employer = Employer::find($id);

        return view('employer.user.show',compact('employer'));
    }

    public function edit($id){
        $employer = Employer::find($id);

        return view('employer.user.edit',compact('employer'));
    }

    public function update($id, Request $request){
        $validated_data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company' => 'required'
        ]);

        $employer = Employer::find($id);
        $employer->name = $validated_data['name'];
        $employer->phone = $validated_data['phone'];
        $employer->email = $validated_data['email'];
        $employer->address = $validated_data['address'];
        $employer->company = $validated_data['company'];

        $employer->save();
        return redirect()->route('employer.index');
    }

    public function changePassword(){
        $employer = Auth::guard('employer')->user();
        return view('employer.user.changePassword',compact('employer'));
    }

    public function handleChangePassword(Request $request){
        $employer = Auth::guard('employer')->user();
        $employerPassword = $employer->password; //pass c??

        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->password, $employerPassword)) {
            return back()->withErrors(['current_password'=>'M???t kh???u kh??ng tr??ng kh???p']);
        }

        $employer->password = Hash::make($request->newpassword);
        $employer->save();

        return redirect()->route('employer.index', ['user' => $employer])->with('success','Thay ?????i m???t kh???u th??nh c??ng');
    }

}
