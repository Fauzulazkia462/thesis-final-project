<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class jobseekerNotifController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        $data = \DB::table('applicants')
        ->leftjoin('jobs', 'applicants.job_id', '=', 'jobs.id')
        ->leftjoin('company_info', 'jobs.input_by', '=', 'company_info.user_id')
        ->select('jobs.job_title', 'jobs.placement', 'company_info.fullname')
        ->where('applicants.user_id', $id)
        ->where('applicants.status', '=', 1)
        ->get();

        return view('jobseeker.notif.index', compact('data'));
    }
}
