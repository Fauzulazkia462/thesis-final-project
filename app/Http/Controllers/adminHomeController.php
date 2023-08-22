<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminHomeController extends Controller
{
    public function index(){

        $employer = \DB::table('users')
        ->leftjoin('company_info', 'users.id', '=', 'company_info.user_id')
        ->where('users.level', '=', '1')
        ->select('users.*', 'company_info.*')
        ->get();

        $jobseeker = \DB::table('users')
        ->leftjoin('personal_info', 'users.id', '=', 'personal_info.user_id')
        ->where('users.level', '=', '2')
        ->select('users.*', 'personal_info.*')
        ->get();

        return view('admin.home.index', compact('employer', 'jobseeker'));
    }

    public function resetPw(Request $req){
        $id = $req->id;

        \DB::table('users')
        ->where('users.id', $id)
        ->update([
            'password' => '$2a$12$Gkuidt7YAKCbJOqXln2P/uYBpfKslggJrGE3OS95vsoSXMp49ZnkS',
        ]);

        return back();
    }
}
