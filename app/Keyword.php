<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    private static $delimeter = ', ';
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

     public static function assignKeywords($new)
    {
        $keywords = new self();
        if(self::delimeters($new) != NULL){
            $inserted_keywords = preg_split('/(,   |,  |, |,)/',$new);
               
           foreach ($inserted_keywords as $keyword) {
               if($keywords->where('name',str_slug($keyword))->exists()){
                    $user_keywords[] = Tag::whereName(['name' => $keyword])->get();
                    continue;
               }
               $keywords->create(['name' => str_slug($keyword) , 'admin_id' => Sentinel::getUser()->id]);
               $user_keywords[] = Tag::whereName($keyword)->get();
               
           }
         
         
        }else{
            if(!$keywords->where('name',str_slug($new))->exists()){
                $keywords->create(['name' => str_slug($new),'admin_id' => Sentinel::getUser()->id]);
                
            }            
            $user_keywords = $keywords->where('name',str_slug($new))->first();
        }
        \Session::put('keywords',$user_keywords);
        return true;
    }
}
