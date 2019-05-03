<?php

namespace App\Http\Controllers;

use App\Company;
use Sentinel;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index')->with('companies',Company::orderByDesc('created_at')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');

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
            
            'name' => 'required|string|min:3|max:50',
            'brief' => 'required|string|min:3|max:2000',
            'logo' => 'required|file|image|max:1999|mimes:png,jpg,jpeg',
            'location' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:3|max:100',
            'website' => ['url','required','min:3','max:100','regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/','string'],
            'founded_at' => 'required|date|date_format:Y-m-d',
            'employees' => 'required|integer|Numeric|min:1',
           

        ]);
       
        


        if (request()->hasFile('logo')){
           $file_with_ext = request()->file('logo')->getClientOriginalName();
           $file_path = request()->file('logo')->move(public_path().'/images/jobs/',$file_with_ext);

        }

        
         $company = company::Create([
            'name' => request('name'),
            'brief' => request('brief'),
            'logo'=> $file_with_ext ?? "company-logo.png",
            'location' => request('location'),
            'address' => request('address'),
            'website' => request('website'),
            'founded_at' => request('founded_at'),
            'employees' => request('employees'),
            'admin_id'=>Sentinel::getUser()->id,
        ]);

        
         if(str_replace(url('/'), '', url()->previous()) == "/jobs/create" ){
            return redirect()->back()->with('info','You Can Creat a Job Now');
            }

        return redirect()->route('companies.show',$company)->with('success','Company Has Been Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if (Sentinel::getUser()->id != $company->admin_id){
            return redirect()->route('company.index')->with('error','unauthorized Page');
        }
        return view('company.edit')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
        request()->validate([
            
            'name' => 'required|string|min:3|max:50',
            'brief' => 'required|string|min:3|max:2000',
            'logo' => 'file|image|max:1999|mimes:png,jpg,jpeg',
            'location' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:3|max:100',
            'website' => ['url','required','min:3','max:100','regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/','string'],
            'founded_at' => 'required|date|date_format:Y-m-d',
            'employees' => 'required|integer|Numeric|min:1',
           

        ]);
       
        


        if (request()->hasFile('logo')){
           $file_with_ext = request()->file('logo')->getClientOriginalName();
           $file_path = request()->file('logo')->move(public_path().'/images/jobs/',$file_with_ext);

        }

        
        company::whereId($company->id)->first()->Update([
            'name' => request('name'),
            'brief' => request('brief'),
            'logo'=> $file_with_ext ?? $company->logo,
            'location' => request('location'),
            'address' => request('address'),
            'website' => request('website'),
            'founded_at' => request('founded_at'),
            'employees' => request('employees'),
            'admin_id'=>Sentinel::getUser()->id,
        ]);

         

        return redirect()->route('companies.show',$company)->with('success','Company Has Been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (Sentinel::getUser()->id != $company->admin_id){
            return redirect()->route('company.index')->with('error','unauthorized Page');
        }
        if($company->logo !==  NULL){
            \File::delete('images/jobs/'.$company->logo);
        }
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company Has Been Deleted Successfully');
    }
}
