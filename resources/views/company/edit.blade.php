@extends('layouts.app')
     
@section('content')

  <div class="container m-t-65 recrutier">
            <div class="row">

                <div class="col-xs-12">
                    <div class="sub sub-l sub-xs-t">

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                            
                                <h3 style="margin-bottom: 25px; text-align: center;">Edit Form For Company</h3>

                                @include('layouts.messages')

                                <form action="{{ route('companies.update',$company) }}" method="POST"  enctype="multipart/form-data" >
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    
                                    
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value= "{{ $company->name }}" required>
                                </div>
                               

                                <div class="form-group">
                                    <label for="brief">Company Brief</label>
                                    <textarea class="form-control" type="textarea" id="brief" placeholder="Company Brief ... " maxlength="140" name="brief" rows="7">{{ $company->brief }}</textarea>
                                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                                </div>
                                <div class="form-group">
                                    <label for="location">Company Location</label>
                                    <select class="form-control" id="location" name="location" required></select>
                                </div>

                        
                                <div class="form-group">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" class="form-control" id="company_address" value= "{{ $company->address }}" name="address" placeholder="Company Address" required>
                                </div>

                                <div class="form-group">
                                    <label for="website">Company Website</label>
                                    <input type="text" class="form-control" id="website" name="website" value= "{{ $company->website }}"placeholder="Company Website" required>
                                </div>

                                <div class="form-group">
                                    <label for="founded_at">Company Fonded At</label>
                                    <input type="date" class="form-control" id="founded_at" value= "{{ $company->founded_at->format('Y-m-d') }}" name="founded_at" placeholder="Company Fonded At" required>
                                </div>

                                <div class="form-group">
                                    <label for="employees">Company Employees Number</label>
                                    <input type="Number" class="form-control" id="employees" name="employees" value= "{{ $company->employees }}" placeholder="Company Employees Number" required>
                                </div>
                                 <label for="logo"> Current Company logo </label>
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">

                                            <img src="{{asset("images/jobs/$company->logo") }}" style="width:70%;border-radis:50%"  alt="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label for="logo"> Upload New Company logo </label>
                                    <input type="file"  name="logo" id="logo"  >
                                </div>

                               <button type="submit" id="submit" class="btn btn-primary pull-right">Update</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
@endsection
