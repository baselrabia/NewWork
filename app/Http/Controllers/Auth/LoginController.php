<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Activation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('auth.login');

    }

    public function postLogin(){

    	request()->validate([
            'email' => new \App\Rules\usernameOrEmail,
            'password' => 'required|string|min:6|max:32',
           'remember' => 'in:on,null'
           
        ],['remember.in' =>'invalid Value']);

    $remember = false;
    if (request()->remember === 'on'){
        $remember = true;
    }

        if($login = \App\User::whereUsernameOrEmail(request()->email,request()->email)->first()){


        $user = Sentinel::Authenticate([
        'login' => $login->email,
    	'password'=> request()->password,
    	 ],$remember);

  

        if($user){
            if (Activation::completed($user)){

        	 if ($user->hasAnyAccess(['admin.*','moderator.*'])) {
                    return redirect()->route('admin.dashboard')->with('success','Welcome To Admin Dashboard');
                }elseif($user->hasAccess('user.*')){
                    return redirect()->route('home')->with('success','logged in Successfully');
                }

            }else{
                return redirect()->route('login')->with('error','Perhaps you forget to activate your account !!! ');
              

        }}}

        return redirect()->back()->with('error', 'invalid Credentials');

       

   

    }

    public function logout(){

    	Sentinel::logout(null,true);
    	return redirect()->route('login')->with('success',' Come Back .. Whenever You Can');

    }
}

