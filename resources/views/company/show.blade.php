@extends('layouts.app')
     
@section('content')


 <div class="container m-t-65 recrutier">
    
            <div class="sub sub-f sub-xs-t header-container job-description">
                <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-3">
                        <img src="/images/jobs/{{ $company->logo }}" alt="company logo" class="img-responsive">
                </div>

                <div class="cover-photo col-xs-8 col-sm-8 col-md-9">
                           <img itemprop="logo"  class="cover_logo" src="/images/jobs/{{ $company->logo }}"" style="display: block;">
                   <div class="black-layer"></div>
                   <h1 class="job-header-no-cover">Jobs and Careers at <span itemprop="name">{{ $company->name }}</span></h1>
                   <span class="pull-right  job-header-span-cover" >Join us from
                                    @if ($company->created_at)
                                       {{ $company->created_at->diffForHumans() }}
                                    @else
                                         Old Time 
                                    @endif </span>
                    <span class="company_main_info">
                        <h3 class="job-name">{{ $company->name }}</h3>

                        <h6><a href="#">Jobs and Careers at {{ $company->name }}</a></h6>

                        <button class="btn btn-default">Follow</button>
                        <button class="btn btn-success">UnFollow</button> <br> 
                        <a href="{{ route('companies.edit',$company) }}" class="btn btn-default" style="color: #333;">Edit</a>

                        <a href="{{ route('companies.destroy',$company) }}" class="btn btn-danger"
                             onclick="event.preventDefault();document.getElementById('company-destroy-form').submit();">
                                Delete </a>

                        <form id="company-destroy-form" action="{{ route('companies.destroy',$company) }}" method="POST" style="display: none;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>
            
                    </span>
                </div>
                </div>
            </div>
@include('layouts.messages')
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3 col-sm-push-8 col-md-push-9">

                     <div class="sub sub-l sub-xs-t">
                        <h5 class="posted">Company Info</h5>
                        <div class="details job-description " style="font-family: Roboto,sans-serif;font-size: 14px;line-height: 1.5;">
                           
                                <p><span class="fa fa-map-marker"></span>{{ $company->location }} / {{ $company->address }} </p>
                                <p><span class="fa fa-globe"></span><a href="{{ $company->website }}">{{ $company->website }}</a></p>    
                            
                                <p><span class="fa fa-search"></span>Year Founded : {{ $company->founded_at->format('Y') }}</p>
                                <p><span class="fa fa-calendar" ></span> Join us at
                                    @if ($company->created_at)
                                       {{ $company->created_at->format('M Y') }}
                                    @else
                                         Old Time 
                                    @endif </p>
                                <p><span class="fa fa-user-o"></span>{{ $company->employees }} employees</p>
                            
                        </div>
                    </div>

                    <div class="sub sub-l sub-xs-t">
                        <h5 class="posted">Company posted by :</h5>
                        <div class="row">
                            <div class="col-xs-3 col-sm-6 col-md-5">
                                <img src="/images/default-profile.jpg" alt="recruiter profile" class="img-responsive">
                            </div>
                            <div class="col-xs-9 col-sm-6 col-md-7 p-l-no">
                                <p><a href="#"><b>{{ $company->admin->username }}</b></a></p>
                                <p>{{ $company->admin->job_position }}</p>
                                <p><a href="#">{{ $company->admin->company_name }}</a></p>
                                <p><span class="fa fa-map-marker" style="width:15px"></span>{{ $company->admin->location }}</p>
                            </div>
                            <div class="col-xs-12 m-t-20">
                                <button class="btn btn-default">Follow</button>
                                <button class="btn btn-success">UnFollow</button>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9 col-sm-pull-4 col-md-pull-3">
                    <div class="sub sub-f sub-xs-t job-description">  
                        <h5 class="title">Company Profile </h5>
                        <p class="description">
                            {{ $company->brief }}
                            
                        </p>
                        <hr>

                        <h5 class="title">keywords :</h5>
                        <div class="keywords">
                            <a href="#">Sourcing</a>
                            <a href="#">Screening</a>
                            <a href="#">CV</a>
                            <a href="#">validation</a>
                            <a href="#">interacting</a>
                            <a href="#">interviews</a>
                            <a href="#">Shortlisting</a>
                            <a href="#">Job</a>
                            <a href="#">Posting</a>
                            <a href="#">Recruitment</a>
                            <a href="#">HR</a>
                            <a href="#">Recruitment</a>
                            <a href="#">Recruiter</a>
                        </div>
                    </div>


                    <div class="sub sub-f sub-xs-t job-description">
                        <h5 class="title">similar jobs</h5>
                    </div>


                </div>

            </div>
        </div>
@endsection
