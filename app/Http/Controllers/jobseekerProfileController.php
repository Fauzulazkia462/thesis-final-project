<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skills;

class jobseekerProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        $edu = \DB::table('education')
        ->select('education.*')
        ->where('education.edu', '<>', NULL)
        ->where('education.user_id', $id)
        ->get();

        $exp = \DB::table('experience')
        ->select('experience.*')
        ->where('experience.exp', '<>', NULL)
        ->where('experience.user_id', $id)
        ->get();

        $skill = \DB::table('skills')
        ->select('skills.*')
        ->where('skills.skill', '<>', NULL)
        ->where('skills.user_id', $id)
        ->get();

        $person = \DB::table('personal_info')
        ->select('personal_info.*')
        ->where('personal_info.user_id', $id)
        ->get();

        return view('jobseeker.profile.index', compact('edu', 'exp', 'skill', 'person'));
    }

    public function insert(Request $req){
        $id = Auth::user()->id;

        $edu = $req->input('edu');
        foreach($edu as $e){
            Education::create([
                'user_id' => $id,
                'edu' => $e,
            ]);
        }

        $exp = $req->input('exp');
        foreach($exp as $xp){
            Experience::create([
                'user_id' => $id,
                'exp' => $xp,
            ]);
        }

        $skill = $req->input('skill');
        foreach($skill as $s){
            Skills::create([
                'user_id' => $id,
                'skill' => $s,
            ]);
        }

        if($req->file){

            $data = \DB::table('personal_info')
            ->select('personal_info.*')
            ->where('personal_info.user_id', $id)
            ->get();

            $filename = 'PP_' .$id. '.jpg';
            $req->file->move('uploads/profile_photo/', $filename);

            if($data->isEmpty()){
                \DB::table('personal_info')
                ->insert([
                    'user_id' => $id,
                    'filename' => $filename,
                ]); 
            } else {
                \DB::table('personal_info')
                ->where('personal_info.user_id', $id)
                ->update([
                    'filename' => $filename,
                ]);
            }
        }

        return back();
    }
}
