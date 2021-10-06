<?php

namespace App\Http\Controllers;
use App\Http\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{   
    public function index(){
        return view('admin.transaction.index');
    }
    
    public function create(){
        return view('admin.transaction.create');
    }
}
