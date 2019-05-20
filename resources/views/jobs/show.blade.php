@extends('layouts.app')
     
@section('content')


 <div class="container m-t-65 recrutier">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3 col-sm-push-8 col-md-push-9">

                       <div class="sub sub-l sub-xs-t">
                        <h5 class="posted" style="font-size: 16px;">About 
                        <a class="company" href="{{ route('companies.show',$job->company) }}">{{ $job->company_name }}</a> </h5>
                        <div class="details job-description " style="font-family: Roboto,sans-serif;font-size: 12px;line-height: 1.5;">
                        <p>{{ $job->company->brief}}<span>... <a href="{{ route('companies.show',$job->company) }}">(See more)</a></span></p>
                    </div>
                        <h5 class="posted">Company Info</h5>
                        <div class="details job-description " style="font-family: Roboto,sans-serif;font-size: 14px;line-height: 1.5;">
                           
                                <p><span class="fa fa-map-marker"></span>{{ $job->company->location }} / {{ $job->company->address }} </p>
                                <p><span class="fa fa-globe"></span><a href="{{ $job->company->website }}">{{ $job->company->website }}</a></p>    
                            
                                <p><span class="fa fa-search"></span>Year Founded : {{ $job->company->founded_at->format('Y') }}</p>
                                <p><span class="fa fa-calendar" ></span> Join us at
                                    @if ($job->company->created_at)
                                       {{ $job->company->created_at->format('M Y') }}
                                    @else
                                         Old Time 
                                    @endif </p>
                                <p><span class="fa fa-user-o"></span>{{ $job->company->employees }} employees</p>
                            
                        </div>
                    </div>

                    <div class="sub sub-l sub-xs-t">
                        <h5 class="posted">job posted by :</h5>
                        <div class="row">
                            <div class="col-xs-3 col-sm-6 col-md-5">
                                <img src="/images/default-profile.jpg" alt="recruiter profile" class="img-responsive">
                            </div>
                            <div class="col-xs-9 col-sm-6 col-md-7 p-l-no">
                                <p><a href="#"><b>{{ $job->admin->username }}</b></a></p>
                                <p>{{ $job->admin->job_position }}</p>
                                <p><a href="#">{{ $job->admin->company_name }}</a></p>
                                <p><span class="fa fa-map-marker" style="width:15px"></span>{{ $job->admin->location }}</p>
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
                        @if ($job->availability == 0)
                        <div class="alert alert-info">
                            <b>This Job is no longer available.</b>
                        </div>
                        @endif

                        <h2 class="job-name">
                            <span><strong>{{ $job->name }}</strong></span>
                            <span class="date">{{ $job->title }}</span>
                            <span><img itemprop="logo"  class="pull-right" src="/images/jobs/{{ $job->company->logo }}"" style="display: block;max-height: 80px;max-width: 160px;"></span>
                            
                        </h2>
                        <br>

                        <h5>
                            <a class="company" href="{{ route('companies.show',$job->company) }}">{{ $job->company_name }}</a> - {{ $job->address }} 
                                                
                        </h5>

                        <p class="job-name"><span class="date" >Posted on {{ $job->created_at->format('d M Y') }}</span></p>

                        @if (Sentinel::guest())

                        <button class="btn btn-primary">Login To Apply</button>
                        <button class="btn btn-primary">Signup To Apply</button>
                        @else

                        <button class="btn btn-success">Apply Now</button>
                        <button class="btn btn-success disabled">You Applied Successfully!</button>

                        <button class="btn btn-warning pull-right">Bookmark</button>
                        <button class="btn btn-primary pull-right">UnBookmark</button>
                        @endif

                        <hr>
                        <div class="details row">
                            <div class="col-xs-6">
                                <p>
                                    <span class="fa fa-graduation-cap"></span>
                                    <b> Education : </b>{{ $job->education }}
                                </p>
                                <p>
                                    <span class="fa fa-map-marker"></span>
                                    <b>Job Address : </b> {{ $job->location }} / {{ $job->address }} 
                                </p>
                                 <p>
                                    <span class="fa fa-calendar"></span> 
                                     <b>Experience Needed : </b>{{ $job->experience }} years
                                </p>
                                
                            </div>
                            <div class="col-xs-6">
                                <p><span class="fa fa-user-o"></span>
                                    <b>Career Level : </b>{{ $job->career_level }}</p>
                                <p><span class="fa fa-briefcase"></span>
                                    <b> Job Type : </b>{{ $job->job_type }}</p>
                                <p><span class="fa fa-money"></span>
                                    <b> Salary : </b>{{ $job->salary }}$</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="title">Job Desciption :</h5>
                        <p class="description">
                           {!! nl2br($job->description) !!} 
                        </p>
                         <h5 class="title">Job Requirements :</h5>
                        <p class="description">
                            {!! nl2br($job->requirements) !!} 
                            
                        </p>
                         <h5 class="title">Job Skills :</h5>
                        <p class="description">
                            <ul style="list-style-type: disc;padding-left: 22px;">
                                @foreach($job->skills as $skill)
                                <li><a href="#">{{ $skill->name }}</a></li>
                                @endforeach
                            </ul>
                        </p>
                        <hr>
                        <h5 class="title">keywords :</h5>
                        <div class="keywords">
                            @foreach($job->keywords as $keyword)
                            <a href="#">{{ $keyword->name }}</a>
                            @endforeach
                            
                           
                        </div>
                    </div>
                    <div class="sub sub-f sub-xs-t job-description">
                        <h5 class="title">similar jobs</h5>
                    </div>
                </div>
            </div>
        </div>
@endsection
