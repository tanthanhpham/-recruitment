<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $jobs = Job::all();

        return view('employer.jobs.index', compact('jobs', 'employer'));
    }

    public function create()
    {
        $employer = Auth::guard('employer')->user();

        return view('employer.jobs.create', compact('employer'));
    }
}
