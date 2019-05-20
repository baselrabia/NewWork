<?php

namespace App;

use Sentinel;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
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

     public static function assignKeywords($new)
    {
        $keywords = new self();
        if(self::delimeters($new) != NULL){
            $inserted_keywords = preg_split('/(,   |,  |, |,)/',$new);
               
           foreach ($inserted_keywords as $keyword) {
            $keywordSlug = str_slug($keyword);

               if($keywords->where('name', $keywordSlug)->exists()){
                    $user_keywords[] = Keyword::whereName(['name' => $keywordSlug])->get();
                    continue;
               }
               $keywords->create(['name' => $keywordSlug , 'admin_id' => Sentinel::getUser()->id]);
               $user_keywords[] = Keyword::whereName($keywordSlug)->get();
               
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
