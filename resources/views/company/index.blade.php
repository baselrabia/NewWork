@extends('layouts.app')
     
@section('content')

  <div class="container m-t-65 recrutier">
    @include('layouts.messages')
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
                            

                     @if(count($companies)>0)
                     @foreach($companies as $company)        
                        <div class="col-xs-12 job-holder">
                            <div class="row">
                                <div class="sub">                            
                                    <div class="image">
                                        <img src="images/jobs/{{ $company->logo }}" class="img img-circle">
                                    </div>
                                    <div class="content">
                                        <button class="btn btn-default apply">See more</button>
                                        <div class="details">
                                            <a href="{{ route('companies.show',$company) }}"><b>{{ $company->name }}</b></a>
                                            <span class="work-type label label-success">{{ $company->founded_at->format('Y') }}</span>
                                            <span class="date" >Posted on {{ $company->created_at->format('d M Y') }}</span>
                                            <p class="address"><small> 
                                                {{ $company->location }} / {{ $company->address }} 
                                                </small>
                                                </p>
                                                
                                            <p>
                                                {!! $company->brief !!} <span>... <a href="{{ route('companies.show',$company) }}">See more</a></span>
                                            </p>
                                           <div class="skills">
                                                <a href="#">PHP</a>
                                                <a href="#">Laravel</a>
                                                <a href="#">jQuery</a>
                                                <a href="#">AJAX</a>
                                                <a href="#">JSON</a>
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
                                 <h5 class="content" >There are No Companies To View Right Now</h5>
                        </div></div></div>
                    @endif

                    </div>

                </div>
            </div>
        </div>

@endsection