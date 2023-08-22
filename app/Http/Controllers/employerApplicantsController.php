<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class employerApplicantsController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        $data = \DB::table('applicants')
        ->leftjoin('jobs', 'applicants.job_id', '=', 'jobs.id')
        ->leftjoin('personal_info', 'applicants.user_id', '=', 'personal_info.user_id')
        ->select('jobs.job_title', 'applicants.*')
        ->where('jobs.input_by', $id)
        ->get();

        return view('employer.applicants.index', compact('data'));
    }

    public function applicantsView(Request $req){
        $userid = $req->userid;
        $jobid = $req->jobid;

        $personaldata = \DB::table('personal_info')
        ->select('personal_info.filename', 'personal_info.user_id')
        ->where('personal_info.user_id', $userid)
        ->get();

        $exp = \DB::table('experience')
        ->select('experience.exp')
        ->where('experience.user_id', $userid)
        ->get();

        $edu = \DB::table('education')
        ->select('education.edu')
        ->where('education.user_id', $userid)
        ->get();

        $skill = \DB::table('skills')
        ->select('skills.skill')
        ->where('skills.user_id', $userid)
        ->get();

        $app = \DB::table('applicants')
        ->select('applicants.email', 'applicants.filename', 'applicants.status')
        ->where('applicants.user_id', $userid)
        ->where('applicants.job_id', $jobid)
        ->get();

        $jobtitle = \DB::table('jobs')
        ->select('jobs.job_title', 'jobs.id')
        ->where('jobs.id', $jobid)
        ->get();

        return view('employer.applicants.view', compact('personaldata', 'exp', 'edu', 'app', 'jobtitle', 'skill'));
    }

    public function proceed(Request $request){
        $id = $request->user_id;
        $job_id = $request->job_id;

        \DB::table('applicants')
        ->where('applicants.user_id', $id)
        ->where('applicants.job_id', $job_id)
        ->update([
            'status' => 1,
        ]);

        return redirect()->to('/employer/applicants');
    }

    public function dismissProcess(Request $request){
        $id = $request->user_id;
        $job_id = $request->job_id;

        \DB::table('applicants')
        ->where('applicants.user_id', $id)
        ->where('applicants.job_id', $job_id)
        ->update([
            'status' => 0,
        ]);

        return redirect()->to('/employer/applicants');
    }

}
