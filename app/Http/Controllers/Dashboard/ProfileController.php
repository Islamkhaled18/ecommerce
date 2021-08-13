<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\ProfileRequest;
use DB;

class ProfileController extends Controller
{
    public function editprofile ()
    {

        $admin = Admin::find(auth('admin')->user()->id);
        return view('dashboard.profile.edit',compact('admin'));

    }


    public function updateprofile(ProfileRequest $request)
    {
        try 
        {
            $admin = Admin::find(auth('admin')->user()->id);

            if($request->filled('password')){
                $request->merge(['password'=>bcrypt($request->password)]);
            }

            unset($request['id']);
            unset($request['password_confirmation']);

            
            $admin -> update($request->all());
            
            return redirect()->back()->with(['success'=> 'Updated Successfuly']);

        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with(['success'=> 'Try Again..!']);
        }
        
    }

    
}
