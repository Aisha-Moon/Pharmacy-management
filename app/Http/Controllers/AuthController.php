<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests;
use App\Http\Requests\ResetPasswordRequest;
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
    public function forgot_post(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->remember_token = Str::random(50);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password reset link sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Email Not Found');
        }
    }
    public function getReset($token){
        if(Auth::check()){
            return redirect('admin/dashboard');
        }
        $user=User::where('remember_token','=',$token);
        if($user->count()==0){
            abort(403);
        }
        $user=$user->first();
        $data['token']=$token;
        return view('auth.reset',$data);
    }

    public function postReset($token, ResetPasswordRequest $request){
        $user=User::where('remember_token','=',$token);
        if($user->count()==0){
            abort(403);
        }
        $user=$user->first();
        $user->password=Hash::make($request->password);
        $user->remember_token=Str::random(50);
        $user->save();
        return redirect('/')->with('success','Password Reset Successfully');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
