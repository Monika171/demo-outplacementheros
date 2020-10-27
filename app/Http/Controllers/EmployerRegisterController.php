<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use Hash;

class EmployerRegisterController extends Controller
{
    public function employerRegister(Request $request){
        
        $this->validate($request,[
            'cname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $employerRole = Role::where('name', 'employer')->first();

    	 $user =  User::create([
            'email' => request('email'),
            'name' => request('name'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
        Company::create([
                'user_id' => $user->id,
                'cname' => request('cname'),
                'slug'=>str_slug(request('cname')),
                'authority_designation' => request('authority_designation'),
            ]);

        $user->roles()->attach($employerRole->id);
        //$user->roles()->attach($employerRole);
        //$user->attachRole($employerRole);

        // To Send Email Verification Notification Uncomment this
        // $user->sendEmailVerificationNotification();

       
        return redirect()->back()->with('message','A verification link is sent to your email. Please follow the link to verify it');
        // return redirect()->back()->with('message','A verification link is sent to your email. Please follow the link to verify it');

       //return redirect()->to('login')->with('message','A verification link is sent to your email. Please follow the link to verify it');
       
    }
}
