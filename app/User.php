<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
   public function getRouteKeyName(){
        return 'username';
    }
    
}
