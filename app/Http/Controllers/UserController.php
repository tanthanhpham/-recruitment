<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        $accounts = Employer::all();
        $user = Auth::guard('admin')->user();

        return view('admin.accounts.index', compact('accounts','user'));
    }

    public function delete($id){

    }

}
