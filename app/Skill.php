<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
   
    private static $delimeters = [' ',','];
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
               if($skills->where('name',str_slug($skill))->exists()){
                    $user_skills[] = Tag::whereName(['name' => $skill])->get();
                    continue;
               }
               $skills->create(['name' => str_slug($skill) , 'admin_id' => Sentinel::getUser()->id]);
               $user_skills[] = Tag::whereName($skill)->get();
               
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
