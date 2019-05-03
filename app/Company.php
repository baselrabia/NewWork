<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function getRouteKeyName(){
        return 'name';
    }
  protected $table = "companies";


  protected $fillable = ['name','brief','logo','location','address','founded_at','employees','website','admin_id'];

   protected $dates = [
        'created_at',
        'updated_at',
        'founded_at'
    ];

    
	public function jobs(){
       return $this->hasMany(Job::class);
    }

    public function admin(){
       return $this->belongsTo(Admin::class);
    }
}
