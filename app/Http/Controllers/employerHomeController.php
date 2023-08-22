<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class employerHomeController extends Controller
{
    public function index(){
        $inputBy = Auth::user()->id;

        $data = \DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.input_by', $inputBy)
        ->get();

        return view('employer.home.index', compact('data'));
    }
}
