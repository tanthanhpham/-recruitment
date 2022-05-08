<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use App\Models\Field;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $hotJobs = Job::orderBy('created_at', 'DESC')->limit(8)->get();
        $jobs = Job::paginate(8);
        $fields = Field::all();
        $accounts = Employer::where('role','employee')->get();
        $companies = Employer::where('role','employer')->get();
        $user = Auth::guard('employer')->user();

        return view('candidate.homepage.index', compact('jobs', 'fields', 'user', 'companies', 'accounts', 'hotJobs'));
    }

    public function search(Request $request){
        $keyword = $request->request->get('keyword');
        $place = $request->request->get('place');
        $field = $request->request->get('field');

        $query = Job::query();

        if ($field){
            $query->where('field_id',$field);
        }

        if ($keyword){
            $query->where('name','like', '%' . $keyword . '%');
        }

        if ($place){
            $query->where('position','like', '%' . $place . '%');
        }
        $jobs = $query->get();

        $fields = Field::all();
        $accounts = Employer::where('role','employee')->get();
        $companies = Employer::where('role','employer')->get();
        $user = Auth::guard('employer')->user();

        return view('candidate.homepage.search', compact('jobs', 'fields', 'user', 'companies', 'accounts'));
    }

    public function show($id){
        $fields = Field::all();
        $job = Job::find($id);
        $jobs = Job::all();
        $user = Auth::guard('employer')->user();

        return view('candidate.homepage.detailJob', compact('job','user', 'jobs', 'fields'));
    }

    public function searchByKey(Request $request)
    {
        $keyword = $request->get('field');
        $jobs = Job::join('field', 'field.id', '=', 'job.field_id')
            ->select('*')
            ->where('field.name', 'like', '%' . $keyword . '%')
            ->get();
        $fields = Field::all();
        $accounts = Employer::where('role','employee')->get();
        $companies = Employer::where('role','employer')->get();
        $user = Auth::guard('employer')->user();

        return view('candidate.homepage.search', compact('jobs', 'fields', 'user', 'companies', 'accounts'));
    }
}
