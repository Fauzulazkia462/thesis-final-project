<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class employerYourvacanciesController extends Controller
{
    public function index(){
        $inputBy = Auth::user()->id;

        $data = \DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.input_by', $inputBy)
        ->get();

        return view('employer.yourvacancies.index', compact('data'));
    }

    public function delete(Request $req){
        $id = $req->id;

        \DB::delete('DELETE FROM jobs WHERE id = ?', [$id]);
        \DB::delete('DELETE FROM job_desc WHERE job_id = ?', [$id]);
        \DB::delete('DELETE FROM job_req WHERE job_id = ?', [$id]);

        return back();
    }
}
