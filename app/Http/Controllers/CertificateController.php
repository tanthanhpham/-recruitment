<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates','user'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        return view('admin.certificates.create',compact('user'));
    }
    public function store(Request $request){
        $user = Auth::guard('admin')->user();

        $validated_data = $request->validate([
            'name' => 'required',
        ]);

        $certificate = new Certificate();
        $certificate->bangcap_ten = $validated_data['name'];
        $certificate->save();

        return redirect()->route('certificate.index');
    }

    public function edit($id){
        $certificate = Certificate::find($id);
        $user = Auth::guard('admin')->user();
        return view('admin.certificates.edit',compact('user','certificate'));
    }

    public function update(Request $request, $id){
        $certificate = Certificate::find($id);
        $validated_data = $request->validate([
            'name' => 'required',
        ]);
        $certificate->bangcap_ten = $validated_data['name'];
        $certificate->save();

        return redirect()->route('certificate.index');
    }


    public function delete($id){
        $certificate = Certificate::find($id)->delete();
        return redirect()->route('certificate.index');
    }
}
