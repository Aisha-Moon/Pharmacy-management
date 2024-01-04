<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Medicine;
use App\Models\MedicinesStock;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    public function dashboard(){
        $data['customerCount']=Customer::count();
        $data['medicineCount']=Medicine::where('is_delete',0)->count();
        $data['medicineStockCount']=MedicinesStock::count();
        $data['suppliersCount']=Supplier::count();
        $data['invoicesCount']=Invoice::count();
        $data['purchasesCount']=Purchase::count();
        $data['header_title']='Dashboard';
        return view('admin.dashboard.list',$data);
    }
    public function my_account(Request $request){
        $data['header_title']='My Account';

        $data['getRecord']=User::find(Auth::user()->id);
        return view('admin.my_account.update',$data);
    }
    public function my_account_update(Request $request){
        $save=request()->validate([
            'email'=>'required|unique:users,email,'.Auth::user()->id

        ]);
        $save=User::find(Auth::user()->id);
        $save->name=trim($request->name);
        $save->email=trim($request->email);
        if(!empty($request->password)){
            $save->password=Hash::make($request->password);
        }
       if(!empty($request->file('profile_img'))){
        if(!empty($save->profile_img) && file_exists('profile/'.$save->profile_img)){
            unlink('profile/'.$save->profile_img);
       }
       $file=$request->file('profile_img');
       $randomStr=Str::random(50);
       $filename=$randomStr.'.'.$file->getClientOriginalExtension();
       $file->move('profile/',$filename);
       $save->profile_img=$filename;


     }

        $save->save();
        return redirect('admin/my_account')->with('success','Profile updated successfully');
    }
}
