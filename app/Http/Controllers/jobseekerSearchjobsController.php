<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class jobseekerSearchjobsController extends Controller
{
    public function index(){
        $data = \DB::table('jobs')
        ->select('jobs.*')
        ->get();

        return view('jobseeker.searchjobs.index', compact('data'));
    }

    public function detail(Request $req){
        $id = $req->id;

        $desc = \DB::table('job_desc')
        ->select('job_desc.*')
        ->where('job_desc.job_id', $id)
        ->where('job_desc.description', '<>', NULL)
        ->get();

        $req = \DB::table('job_req')
        ->select('job_req.*')
        ->where('job_req.job_id', $id)
        ->where('job_req.req', '<>', NULL)
        ->get();

        $jobData = \DB::table('jobs')
        ->leftjoin('company_info', 'jobs.input_by', '=', 'company_info.user_id')
        ->select('jobs.job_title', 'company_info.fullname')
        ->where('jobs.id', $id)
        ->get();

        // return $jobtitle;

        // return $req;
        return view('jobseeker.searchjobs.detail', compact('desc', 'req', 'jobData'));
    }

    public function form(Request $req){
        $id = $req->id;

        return view('jobseeker.searchjobs.form', compact('id'));
    }

    public function submit(Request $req){
        $userid = Auth::user()->id;
        $jobid = $req->job_id;

        // return $jobid;

        $req->validate([
            'file' => 'required|mimes:pdf'
        ]);

        // $filename = $req->file->getClientOriginalName();
        $filename = 'CV_' .$userid. '.pdf';
        $req->file->move('uploads/cv/', $filename);

        \DB::table('applicants')
        ->insert([
            'job_id' => $jobid,
            'user_id' => $userid,
            'email' => $req->email,
            'filename' => $filename,
        ]);

        return redirect()->to('/jobseeker/home');
    }
}
