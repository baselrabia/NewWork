<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Activation;
use Mail; 
use App\Mail\Activation as UserActivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function getRegister(){
    	return view('auth.register');

    }

    public function postRegister(){
    	/*
	    	array:13 [▼
			  "_token" => "COB4DWlwfwa24z4BvCSy9cSzNlt5f3Ihll3e5E6e"
			  "first_name" => "bfdbdf"
			  "last_name" => "bfdfbd"
			  "username" => "dffdgggfd"
			  "email" => "baselrabia@gmail.com"
			  "password" => "123456"
			  "password_confirmation" => "123456"
			  "phone" => "011210410540"
			  "location" => "egypt"
			  "sec_question" => "who_is_your_favorite_doctor_or_teacher"
			  "sec_answer" => "dfdsfds"
			  "dob" => "1998-11-11"
			  "gender" => "male"
			]
    	*/

		request()->validate([
			'first_name'=> 'required|min:3|max:18|alpha ',
    	 	'last_name'=> 'required|min:3|max:18|alpha ',   	 	
    	 	'username' => 'required|min:6|max:18|alpha_dash|unique:users,username',
    	 	'email' => 'required|unique:users,email|email',
    	 	'password'=> 'required|string|min:6|max:32|confirmed ',
    	 	 'phone'=> 'required|string|min:10|max:30',
    	 	'location'=> ['regex:/^[a-zA-Z0-9-_. ]*$/','required','min:3','max:23'],
    	 	'sec_question'=>'required|string|in:where_are_you_from,what_is_your_hobby,what_is_your_favorite_car,who_is_your_favorite_doctor_or_teacher',
    	 	'sec_answer'=> ['regex:/^[a-zA-Z0-9 ]*$/','required','min:3','max:32','string'],
    	 	'dob'=> 'required|date|before_or_equal:2010-01-01|date_format:Y-m-d',
    	 	'gender'=> 'required|string|in:male,female',
            'job_position' =>'string|min:3|max:80',
            'company_name'=>'string|min:3|max:80',
            'register_as' => 'required',
    	 	


		]);
		

		$user = Sentinel::register([
			'first_name'=> request()->first_name,
    	 	'last_name'=> request()->last_name, 	
    	 	'username' => request()->username,
    	 	'email' =>request()->email,
    	 	'password'=> request()->password,
    	 	'phone'=> request()->phone,
    	 	'location'=> request()->location,
    	 	'secuirty_question'=> request()->sec_question,
    	 	'secuirty_answer'=> request()->sec_answer,
    	 	'dob'=> request()->dob,
    	 	'gender'=> request()->gender,
            'job_position' => request()->job_position,
            'company_name'=> request()->company_name,
    	 	
    	 ]);
		
    	 $activationToken = Activation::create($user);


         Mail::to($user)->send(new UserActivation($user,$activationToken));

         if(request()->register_as == 'user' ){
                $role = Sentinel::findRoleBySlug('user');
                $role->users()->attach($user);
            }elseif(request()->register_as == 'recruiter'){
                $role = Sentinel::findRoleBySlug('recruiter');
                $role->users()->attach($user);
            }

    	return redirect()->route('login')->with('success','you have been Registered Successfully, Check your email for verify');

    }
}
