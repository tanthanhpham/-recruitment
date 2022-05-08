<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Employer;
use App\Models\Field;
use App\Models\Job;
use App\Models\Language;
use App\Models\Position;
use App\Models\Recruitment;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class JobController extends Controller
{
    public function index()
    {
        $employer = Auth::guard('employer')->user();
        $jobs = Job::where('employer_id', $employer->id)->paginate(12);

        return view('employer.jobs.index', compact('jobs', 'employer'));
    }

    public function show(int $id)
    {
        $employer = Auth::guard('employer')->user();
        $fields = Field::all();
        $salaries = Salary::all();
        $positions = Position::all();
        $languages = Language::all();
        $certificates = Certificate::all();
        $job = Job::find($id);
        $recruitments = Recruitment::where('job_id', $id)->get();
        $employeeList = [];
        foreach ($recruitments as $recruitment)
        {
            $employeeList[] = $recruitment->employee_id;
        }
        $employees = [];
        foreach ($employeeList as $employee)
        {
            $employees[] = Employer::find($employee);
        }

        return view('employer.jobs.show', compact('employer', 'fields','salaries', 'positions', 'languages','certificates','job', 'employees', 'recruitments'));
    }

    public function edit(int $id)
    {
        $employer = Auth::guard('employer')->user();
        $fields = Field::all();
        $salaries = Salary::all();
        $positions = Position::all();
        $languages = Language::all();
        $certificates = Certificate::all();
        $job = Job::find($id);

        return view('employer.jobs.edit', compact('employer', 'fields','salaries', 'positions', 'languages','certificates','job'));
    }

    public function create()
    {
        $employer = Auth::guard('employer')->user();

        $fields = Field::all();
        $salaries = Salary::all();
        $positions = Position::all();
        $languages = Language::all();
        $certificates = Certificate::all();

        return view('employer.jobs.create', compact('employer', 'fields','salaries', 'positions', 'languages','certificates'));
    }

    public function store(Request $request)
    {
        $employer = Auth::guard('employer')->user();

        $validated_data = $request->validate([
            'name' => 'required',
            'place' => 'required',
            'description' => 'required',
            'benefit' => 'required',
            'field' => 'required',
            'salary' => 'required',
            'position' => 'required',
            'language' => 'required',
            'certificate' => 'required',
            'requirement' => 'required',
            'number' => 'required',
            'brief' => 'required',
            'end_date' => 'required',
            'file' => 'required'
        ]);

        $nameFIle = $request->file('file')->getClientOriginalName();
        $nameFIle = time() . $nameFIle;
        $request->file->move(public_path('uploads'), $nameFIle);

        $job = new Job();
        $job->gender = 'male';
        $job->position = $validated_data['place'];
        $job->name = $validated_data['name'];
        $job->description = $validated_data['description'];
        $job->requirement = $validated_data['requirement'];
        $job->benefit = $validated_data['benefit'];
        $job->number = $validated_data['number'];
        $job->brief = $validated_data['brief'];
        $job->field_id = $validated_data['field'];
        $job->certificate_id = $validated_data['certificate'];
        $job->salary_id = $validated_data['salary'];
        $job->rank_id = $validated_data['position'];
        $job->employer_id = $employer->id;
        $job->path = $nameFIle;

        $date =  Carbon::createFromFormat('m/d/Y', $validated_data['end_date'])->format('m-d-Y');

        $job->end_date = new \DateTime($date);;

        $job->save();

        return redirect()->route('job.index');
    }

    public function update(Request $request, int $id)
    {
        $employer = Auth::guard('employer')->user();

        $validated_data = $request->validate([
            'name' => 'required',
            'place' => 'required',
            'description' => 'required',
            'benefit' => 'required',
            'field' => 'required',
            'salary' => 'required',
            'position' => 'required',
            'language' => 'required',
            'certificate' => 'required',
            'requirement' => 'required',
            'number' => 'required',
            'brief' => 'required'
        ]);

        $job = Job::find($id);
        $job->gender = 'male';
        $job->position = $validated_data['place'];
        $job->name = $validated_data['name'];
        $job->description = $validated_data['description'];
        $job->requirement = $validated_data['requirement'];
        $job->benefit = $validated_data['benefit'];
        $job->number = $validated_data['number'];
        $job->brief = $validated_data['brief'];
        $job->field_id = $validated_data['field'];
        $job->certificate_id = $validated_data['certificate'];
        $job->salary_id = $validated_data['salary'];
        $job->rank_id = $validated_data['position'];
        $job->employer_id = $employer->id;
        $job->save();

        return redirect()->route('job.index');
    }
}
