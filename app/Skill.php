<?php

namespace App;

use Sentinel;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
   
    protected $fillable = ['name','admin_id'];


     public function getRouteKeyName(){
        return 'name';
    }

    public function jobs(){
       return $this->belongsToMany(Job::class);
    }

    public function admin(){
       return $this->belongsTo(Admin::class);
    }


    public static function delimeters($request){
         $delimeter = ',';
            if(strpos($request,$delimeter)){
                $delimeters[] = $delimeter;    
            } 
        
        return $delimeters ?? NULL;
    }

     public static function assignSkills($new)
    {
        $skills = new self();
        if(self::delimeters($new) != NULL){
            $inserted_skills = preg_split('/(,   |,  |, |,)/',$new);
               
           foreach ($inserted_skills as $skill) {
            $skillSlug = str_slug($skill);

               if($skills->where('name', $skillSlug)->exists()){
                    $user_skills[] = Skill::whereName(['name' =>  $skillSlug])->get();
                    continue;
               }
               $skills->create(['name' => $skillSlug , 'admin_id' => Sentinel::getUser()->id]);
               $user_skills[] = Skill::whereName( $skillSlug )->get();
               
           }
         
         
        }else{
            if(!$skills->where('name',str_slug($new))->exists()){
                $skills->create(['name' => str_slug($new),'admin_id' => Sentinel::getUser()->id]);
                
            }            
            $user_skills = $skills->where('name',str_slug($new))->first();
        }

        \Session::put('skills',$user_skills);
        return true;
    }

}
