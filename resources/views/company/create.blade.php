@extends('layouts.app')
     
@section('content')

  <div class="container m-t-65 recrutier">
            <div class="row">

                <div class="col-xs-12">
                    <div class="sub sub-l sub-xs-t">

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                            
                                <h3 style="margin-bottom: 25px; text-align: center;">Register Your Company</h3>

                                <form action="{{ route('companies.store') }}" method="POST"  enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value= "{{ old('name') }}" required>
                                </div>
                               

                                <div class="form-group">
                                    <label for="brief">Company Brief</label>
                                    <textarea class="form-control" type="textarea" id="brief" placeholder="Company Brief ... " maxlength="140" name="brief" rows="7">{{ old('brief') }}</textarea>
                                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                                </div>
                                <div class="form-group">
                                    <label for="location">Company Location</label>
                                    <select class="form-control" id="location" name="location" value= "{{ old('location') }}" required></select>
                                </div>

                        
                                <div class="form-group">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" class="form-control" id="company_address" value= "{{ old('address') }}" name="address" placeholder="Company Address" required>
                                </div>

                                <div class="form-group">
                                    <label for="website">Company Website</label>
                                    <input type="text" class="form-control" id="website" name="website" value= "{{ old('website') }}"placeholder="Company Website" required>
                                </div>

                                <div class="form-group">
                                    <label for="founded_at">Company Fonded At</label>
                                    <input type="date" class="form-control" id="founded_at" value= "{{ old('founded_at') }}" name="founded_at" placeholder="Company Fonded At" required>
                                </div>

                                <div class="form-group">
                                    <label for="employees">Company Employees Number</label>
                                    <input type="Number" class="form-control" id="employees" name="employees" value= "{{ old('employees') }}" placeholder="Company Employees Number" required>
                                </div>

                                <div class="form-group">

                                    <label for="logo"> Upload Company logo </label>
                                    <input type="file"  name="logo" id="logo" value="{{ old('logo') }}" >
                                </div>

                               <button type="submit" id="submit" class="btn btn-primary pull-right">Create</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
@endsection
