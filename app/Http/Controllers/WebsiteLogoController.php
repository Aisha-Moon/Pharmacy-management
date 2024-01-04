<?php

namespace App\Http\Controllers;

use App\Models\WebsiteLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsiteLogoController extends Controller
{
    public function website_logo(Request $request){
        $data['getRecord']=WebsiteLogo::find(1);
        $data['header_title']='Website Logo';

        return view('admin.website_logo.update',$data);
    }
    public function website_logo_update(Request $request){
        $save=WebsiteLogo::find(1);
        $save->website_name=trim($request->website_name);
        if(!empty($request->file('website_logo'))){
            if(!empty($save->website_logo) && file_exists('logo/'.$save->website_logo)){
                unlink('logo/'.$save->website_logo);
           }
           $file=$request->file('website_logo');
           $randomStr=Str::random(50);
           $filename=$randomStr.'.'.$file->getClientOriginalExtension();
           $file->move('logo/',$filename);
           $save->website_logo=$filename;


         }

            $save->save();
            return redirect()->back()->with('success','Website Logo updated successfully');

    }
}
