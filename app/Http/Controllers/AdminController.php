<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email','password');
        $user = Admin::where('email',$request->email)->first();
        // var_dump($user->email);
        // exit();
        if (Auth::guard('admin')->attempt($credentials)) {
            if($user->is_active == 0) {
                return view('admin.users.login');
            }else return redirect()->route('product.index');
        }else {
            return view('admin.users.login');
        };
    }

    public function index(){
        $user = Auth::guard('admin')->user();
        $userlist = Admin::paginate(3);
        return view('admin.users.index', compact('user'), compact('userlist'));

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        return view('admin.users.create', compact('user'));
    }

    public function store(Request $request){
        $validated_data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'new_password' => 'required|confirmed'
        ]);
        $validated_data['password'] = Hash::make($request->new_password);
        $user= new Admin();
        $user->name=$validated_data['name'];
        $user->phone=$validated_data['phone'];
        $user->email=$validated_data['email'];
        $user->password=$validated_data['password'];
        $user->save();
        // $user = $this->admin->create($validated_data);

        return redirect()->route('admin.index', ['user' => $user])->with('success', 'Account successfully created');

    }
    
    public function show($id){
        $user = Admin::find($id);
        return view('admin.users.show',compact('user'));
    }

    public function edit(){
        $user = Auth::guard('admin')->user();
        return view('admin.users.edit',compact('user'));
    } 

    public function  change_password(Request $request){
        $user = Auth::guard('admin')->user();
        $userPassword= $user->password; //pass cũ

        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->route('admin.index', ['user' => $user])->with('success','password successfully updated');
    }

    public function lock($id){
        $user = Auth::guard('admin')->user();
        $userlist = Admin::all();
        
        $userlock = Admin::find($id);
        if($userlock->is_active == 0){
            $userlock->is_active=1;
        } else  $userlock->is_active=0;
        $userlock->save();

        return redirect('admin/')->with('success','Account locked/unlocked successfully');
    } 
    function checkemail(Request $request)
    {   
        echo $request->get('emailcheck');
        if($request->get('emailcheck'))
        {
            $emailcheck = $request->get('emailcheck');
            $data = Admin::where('email', $emailcheck)->count();
            if($data > 0)
            {
                echo 'not_unique';
            }
            else
            {
                echo 'unique';
            }
        }
    }

}
