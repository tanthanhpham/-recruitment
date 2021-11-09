<?php

namespace App\Http\Controllers;

use Mail;
use App\Jobs\SendMail;
use App\Models\Product;
use App\Models\Size;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class TransactionController extends Controller
{   
    public function index(){
        $user = Auth::guard('admin')->user();
        $trans=Transaction::paginate(10);
        return view('admin.transaction.index',compact('user','trans'));
    }
    
    public function store(Request $request){
        $products = Product::all();
        $sizes= Size::all();
        $data=$request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'total' => 'required'
        ]);

        $trans= new Transaction();
        $trans->name=$data['name'];
        $trans->address=$data['address'];
        $trans->phone_number=$data['phone_number'];
        $trans->total=$data['total'];
        $trans->email=$data['email'];
        $trans->note=$request->note;
        $trans->payment=$request->payment;
        $trans->discount=0;
        $trans->status=0;

        $trans->save();
        $trans_id=$trans->id;
        $i=0;
        foreach(session('cart')->products as  $product){
            echo ($product['id']);
            $product_order[$i]=([
                'trans_id' => $trans_id,
                'product_price_id' => $product['id_price'],
                'number' => $product['quanty'],
            ]);
            $i++;
         
        }

        $trans->orders()->attach($product_order);
        $request->session()->forget('cart');
        SendMail::dispatch($trans,$products,$sizes)->delay(now()->addMinute(1));
        // dd($product_order);
        return  redirect('/');
    }

    public function show($id){
        $user = Auth::guard('admin')->user();
        $trans= Transaction::find($id);
        $products = Product::all();
        $sizes= Size::all();
        // dd($trans->orders);
        // foreach($trans->order as $item)
        return view('admin.transaction.show',compact('user','trans','products','sizes'));
    }

    public function edit($id,$key){
        $user = Auth::guard('admin')->user();
        $products = Product::all();
        $trans= Transaction::find($id);
        $sizes= Size::all();
        if($key == 'a'){
            $trans->status=1;
            SendMail::dispatch($trans,$products,$sizes)->delay(now()->addMinute(1));
        }elseif($key == 'c'){
            $trans->status=2;
        }else{
            $trans->status=3;
        }
        $trans->save();
        return  redirect('admin/transactions/');
    }

    public function delete($id){
        $trans=Transaction::find($id);
        $trans->orders()->detach();
        Transaction::where('id',$id)->delete();
        return redirect('admin/transactions')->with('success','Deleted');
    }
}
