<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Job;
use App\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{   
    public function listUnApproved(){
        $jobs = Job::whereApproved(0)->get();
        return view('jobs.index')->with('jobs',$jobs);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.index')->with('jobs',Job::listApproved()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
         request()->validate([
            'name'  => 'required|string|min:3|max:200',
            'title' => 'required|string|min:3|max:200',
            'description' => 'required|string|min:3|max:2000',
            'requirements' => 'string|min:3|max:2000',
            'job_type' => 'required|string|min:3|max:200',
            'location' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:3|max:100',
            'company_name' => 'required|string|min:3|max:50',
            'experience' => 'string|max:3',
            'education' => 'string|min:3|max:200',
            'career_level' => 'string|min:3|max:200',
            'skills' => ['required','string','regex:/^[a-zA-Z0-9-_., ]*$/','min:3','max:150'],
            'salary' => 'required',
            'keywords'=> ['string','regex:/^[a-zA-Z0-9-_., ]*$/','min:3','max:150']

        ]);

         

         if(!Company::whereName(request('company_name'))->first()){
            return redirect()->route('companies.create')->with('info','It Is Important To Register Your Company With Us ,So You Can Attach Jobs'); 
        }
        $company_id=Company::whereName(request('company_name'))->first()->id;
       

        if (\App\Skill::assignSkills(request('skills'))){
            if (\App\Keyword::assignKeywords(request('keywords'))){

        $job = job::Create([
            'name'  => request('name'),
            'title'=> request('title'),
            'description' => request('description'),
            'requirements' =>request('requirements'),
            'job_type' => request('job_type'),
            'experience' =>request('experience'),
            'education' =>request('education'),
            'career_level' =>request('career_level'),
            'salary' => request('salary'),
            'location' => request('location'),
            'address' => request('address'),
            'company_name' => request('company_name'),
            'company_id' => $company_id,
            'admin_id'=>Sentinel::getUser()->id,
           
        ]);

        if(is_array(\Session::get('skills'))){
                foreach(\Session::get('skills') as $skill){

                    $job->skills()->attach($skill);
                }
            }else{
                $job->skills()->attach(\Session::get('skills'));
                
            }
            \Session::forget('skills');

        if(is_array(\Session::get('keywords'))){
                foreach(\Session::get('keywords') as $keyword){

                    $job->keywords()->attach($keyword);
                }
            }else{
                $job->keywords()->attach(\Session::get('keywords'));
                
            }
            \Session::forget('keywords');

       

        

        return redirect()->route('jobs.index')->with('success','Job Has Been Created Successfully'); 

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
       return view('jobs.show')->with('job',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        if (Sentinel::getUser()->id != $job->admin_id){
            return redirect()->route('jobs.index')->with('error','unauthorized Page');
        }
        return view('jobs.edit')->with('job',$job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        if (Sentinel::getUser()->id != $job->admin_id){
            return redirect()->route('jobs.index')->with('error','unauthorized Page');
        }
        
        $job->delete();
        return redirect()->route('jobs.index')->with('success','job Has Been Deleted Successfully');
    }
}
