<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }


    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $level = Auth::user()->level;

        // return $level;

        if($level == '1'){
            return redirect()->to('/employer/home');
        }
        else if($level == '2'){
            return redirect()->to('/jobseeker/home');
        }
        else if($level == '3'){
            return redirect()->to('/admin/home');
        }

        // return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }

    public function registerPage(){
        return view('login.register');
    }

    public function registerEmployer(){
        return view('login.registemp');
    }

    public function registerJobseeker(){
        return view('login.registjobseeker');
    }

    public function createEmployer(Request $req){

        $password = Hash::make($req->password);

        $getId = \DB::table('users')
        ->insertGetId([
            'username' => $req->username,
            'password' => $password,
            'level' => $req->level,
        ]);

        \DB::table('company_info')
        ->insert([
            'user_id' => $getId,
            'fullname' => $req->fullname,
            'phone' => $req->phone,
        ]);

        return redirect()->to('/login');
    }

    public function createJobseeker(Request $req){

        $password = Hash::make($req->password);

        $getId = \DB::table('users')
        ->insertGetId([
            'username' => $req->username,
            'password' => $password,
            'level' => $req->level,
        ]);

        \DB::table('personal_info')
        ->insert([
            'user_id' => $getId,
            'fullname' => $req->fullname,
            'phone' => $req->phone,
        ]);

        return redirect()->to('/login');
    }
}
