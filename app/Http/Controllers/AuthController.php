<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
     
        return view('auth.login');
    }
    public function login_post(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
            if(Auth::User()->is_role==1){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect()->back()->with('error','Incorrect Credentials');
            }
        }else{
            return redirect()->back()->with('error','Incorrect Credentials');
        }
    }
    public function forgot(){
        return view('auth.forgot');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
