<?php

namespace App;

use Sentinel;
use Activation;
use Cartalyst\Sentinel\Users\EloquentUser;

class Admin extends EloquentUser
{
    protected $table = "users";

    public function companies(){
       return $this->hasMany(Company::class);
    }
    public function jobs(){
       return $this->hasMany(Job::class);
    }


    public static function listUsers(){
        foreach (\App\Admin::pluck('id') as $value) {
            $user = Sentinel::findById($value);
            if(Activation::completed($user)){
                if(!$user->hasAnyAccess(['admin.*'])){
                    $users[] = $user;
                }
            }
            continue;
        }
        return $users ?? NULL;
    }   



    public static function upgradeUser($id,$permissions){
    	$user = Sentinel::findById($id);

    	if ($user->hasAccess('admin.*')){
    		return false;
    	}

    	if (is_array($permissions)){
    		foreach ($permissions as $permission => $value) {
    			$user->updatePermission($permission,$value,true)->save();

    		}
    		return true;
    	}else{
    		$user->updatePermission($permissions,true,true)->save();
    		return true;
    	}
    	return false;
    }




 	public static function downgradeUser($id,$permissions){
    	$user = Sentinel::findById($id);

    	if ($user->hasAccess('admin.*')){
    		return false;
    	}

    	if (is_array($permissions)){
    		foreach ($permissions as $permission => $value) {
    			$user->updatePermission($permission,$value,true)->save();

    		}
    		return true;
    	}else{
    		$user->updatePermission($permissions,false,true)->save();
    		return true;
    	}
    	return false;
    }

}
