<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = ['name','title','description','requirements','job_type','experience','salary','skills','education','career_level','company_name','availability','approved','approved_by','approved_at','admin_id'];

    public static function listApproved(){
    	return static::whereApproved(1)->orderByDesc('created_at');
    }

    public function company(){
       return $this->belongsTo(Company::class);
    }
    public function admin(){
       return $this->belongsTo(Admin::class);
    }
}
