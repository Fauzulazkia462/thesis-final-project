<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JobDesc;
use App\Models\JobReq;

class employerInputjobsController extends Controller
{
    public function index(){
        return view('employer.inputjobs.index');
    }

    public function inputjob(Request $req){
        $inputBy = Auth::user()->id;

        $jobId = \DB::table('jobs')
                    ->insertGetId([
                        'job_title' => $req->job_title,
                        'placement' => $req->placement,
                        'salary' => $req->salary,
                        'status' => 1,
                        'input_by' => $inputBy,
                    ]);

        $jobDesc = $req->input('job_desc');
        foreach($jobDesc as $jd){
            JobDesc::create([
                'description' => $jd,
                'job_id' => $jobId,
            ]);
        }

        $jobReq = $req->input('job_req');
        foreach($jobReq as $jr){
            JobReq::create([
                'req' => $jr,
                'job_id' => $jobId,
            ]);
        }

        return back();
    }
}
