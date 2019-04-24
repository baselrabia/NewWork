<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     public function getRole(){     	
    	return view('admin.makeRole')->with('roles',Sentinel::getRoleRepository()->all());

    }

    public function postRole(){

    	$permissionDef=[".create",".show",".edit",".approve",".delete"];


    	foreach ($permissionDef as $permission ) {
    		if (in_array($permission, Request()->permissions)){
    			$permissions[Request()->slug .$permission] = true  ;
	    	}else{
	    		$permissions[Request()->slug .$permission] = false  ;
	    	}

    	}



        $role = Sentinel::getRoleRepository()->createModel()->create([
		    'name' => Request()->name,
		    'slug' => Request()->slug,
		    'permissions' => $permissions ,
		]);

		return redirect()->back()->with('success', 'Role Has Been Added Successfuly');


      

    }
}
