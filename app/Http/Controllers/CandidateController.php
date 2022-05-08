<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use App\Models\Field;
use App\Models\Job;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['auth', 'verified']);
//    }

    public function signup(){
        $user = null;
        $jobs = Job::all();
        $fields = Field::all();

        return view('candidate.users.signup', compact('jobs','fields', 'user'));
    }

    public function store(Request $request){
        $validatedDate = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:employer',
            'email' => 'required|email|unique:employer',
            'password' => 'required',
            'address' => 'required',
        ]);

        $validatedDate['password'] = Hash::make($request->password);

        $employer = new Employer();
        $employer->name = $validatedDate['name'];
        $employer->phone = $validatedDate['phone'];
        $employer->email = $validatedDate['email'];
        $employer->address = $validatedDate['address'];
        $employer->password = $validatedDate['password'];

        $employer->save();
        return redirect()->route('candidate.login')->with('success', 'Register successfully');
    }

    public function signin(){
        $user = Auth::guard('employer')->user();
        $fields = Field::all();
        $jobs = Job::all();

        return view('candidate.users.login', compact('user', 'jobs', 'fields'));
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');
        if (Auth::guard('employer')->attempt($credentials)) {
            $employer = Auth::guard('employer')->user();
            if ($employer->role == 'employee'){
                return redirect()->route('home.index');
            }

            return redirect()->route('candidate.signin');
        }else {

            return redirect()->route('candidate.signin');
        };
    }

    public function logout(){
        Auth::guard('employer')->logout();

        return redirect('/');
    }

    public function apply(Request $request){
        $validatedData = $request->validate([
            'file' => 'required',

        ]);
        $nameFIle = $request->file('file')->getClientOriginalName();
        $nameFIle = time() . $nameFIle;
        $request->file->move(public_path('uploads'), $nameFIle);

        $user = Auth::guard('employer')->user();
        $jobId = $request->request->get('id');
        $recruitment = Recruitment::where('employee_id', $user->id)->first();
        if ($recruitment){
            if ($recruitment->job_id == $jobId) {

                return dd('that bai');
            }

        }

        $recruitment = new Recruitment();
        $recruitment->employee_id = $user->id;
        $recruitment->job_id = $request->request->get('id');
        $recruitment->path = 'uploads/' . $nameFIle;
        $recruitment->save();

        return dd('thanh cong');
    }

    public function show($id){
        $user = Auth::guard('employer')->user();
        $recruitments = Recruitment::where('employee_id', $user->id)->get();
        $jobList = [];
        foreach ($recruitments as $recruitment)
        {
            $jobList[] = $recruitment->job_id;
        }
        $jobs= [];
        foreach ($jobList as $jobId)
        {
            $jobs[] = Job::find($jobId);;
        }
        $fields = Field::all();

        return view('candidate.users.show', compact('user','jobs', 'fields'));
    }
}
