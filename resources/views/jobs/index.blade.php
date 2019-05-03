@extends('layouts.app')
     
@section('content')

  <div class="container m-t-65 recrutier">
            <div class="row search-jobs">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="sub sub-f sub-xs-t search-jobs p-t-15">
                        <h4 class="posted m-b-15">search jobs :</h4>
                        <hr>
                        <form class="navbar-form navbar-left m-b-30">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h5 class="posted m-b-15">countries :</h5>
                        <div class="scrollbar" id="countries"></div>
                        <hr>
                        <h5 class="posted m-b-15">experience :</h5>
                        <div class="scrollbar" id="experience"></div>
                        <hr>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="sub sub-l sub-xs-t job-description" style="overflow: hidden;">
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                            </div>
                        </div>
                            

                     @if(count($jobs)>0)
                     @foreach($jobs as $job)        
                        <div class="col-xs-12 job-holder">
                            <div class="row">
                                <div class="sub">                            
                                    <div class="image">
                                        <img src="images/jobs/{{ $job->logo }}" class="img img-circle">
                                    </div>
                                    <div class="content">
                                        <button class="btn btn-success apply">Apply</button>
                                        <div class="details">
                                            <a href="#"><b>PHP Developer</b></a>
                                            <span class="work-type label label-success">{{ $job->job_type }}</span>
                                            <span class="date" >Posted on {{ $job->created_at }}</span>
                                            <p class="title">{{ $job->title }}</p>
                                            <p class="address">
                                                <a class="company" href="">{{ $job->company_name }}</a>
                                                {{ $job->location }} / {{ $job->address }} 
                                                </p>
                                                
                                            <p>
                                                {!! $job->description !!} <span>... <a href="{{ route('job.show',$job) }}">See more</a></span>
                                            </p>
                                            <div class="skills">
                                                @foreach($skills as $skill) 
                                                    <a href="#">{{ $skill }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="col-xs-12 job-holder">
                            <div class="row">
                                <div class="sub">   
                                 <h5 class="content" >There are No Jobs To View Right Now</h5>
                        </div></div></div>
                    @endif

                    </div>

                </div>
            </div>
        </div>

@endsection