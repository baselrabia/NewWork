@extends('layouts.app')

@section('content')
  <div class="container" style="padding-top: 30px">    
            <div id="loginbox" style="margin-top:50px;  margin-bottom: 90px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title"> Reset Password </div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                        </div>     

                        <div style="padding-top:30px ;" class="panel-body" >

                            @include('layouts.messages')
                                                        
                           <form class="form-horizontal " action="{{ route('reset-password') }}"  method="POST" id="loginform" role="form">
                            {{ csrf_field() }}
                                        
                              

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">New Password</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                              
                              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password_confirmation" class="col-md-4 control-label">Password Confirmation</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

       
                                    
                           
                 

                       
                                        

                                    <div style="margin-top:10px; text-align: center;" class="form-group ">

                                        <div class="col-sm-12 controls">
                                          <button id="btn-login"  type="submit" class="btn btn-success"> 
                                             Submit New Password
                                          </button>
                                         
                                        </div>
                                    
                             </form> 
                           
                    

                    </div>                     
                </div>  
            </div>


                   
                   
                    
             </div> 
        </div>
@endsection
