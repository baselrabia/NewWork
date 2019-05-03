@extends('layouts.app')

@section('content')
  <div class="container" style="padding-top: 30px">    
            <div id="loginbox" style="margin-top:50px;  margin-bottom: 90px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">Sign In</div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                        </div>     

                        <div style="padding-top:30px ;" class="panel-body" >

                            @include('layouts.messages')
                                                        
                           <form class="form-horizontal " action="{{ route('login') }}"  method="POST" id="loginform" role="form">
                            {{ csrf_field() }}
                                        
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="username or email">                                        
                                </div>
                                    
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                </div>

                                <p class=" pull-right"><small><a href="{{ route('reset') }}"> Forgot Your Password ? </a></small></p>

                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-1">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                        

                                    <div style="margin-top:10px; text-align: center;" class="form-group ">

                                        <div class="col-sm-12 controls">
                                          <button id="btn-login"  type="submit" class="btn btn-success">Login 
                                          To Your account</button>
                                         
                                        </div>
                                    </div><p class="text-center "><small>Don't have an account? <a href="{{ route('register') }}"> Sign Up </a></small></p>
                             </form> 
                             <hr>
                             
                        <div class="form-group row">
                            <div class="text-center"> 
                                <a href="{{ url('/login/google') }}" class="btn btn-primary" style="background-color:#cf4332;border-color:#cf4332; "><i class="fa fa-google-plus fa-lg" aria-hidden="true" style="padding:6px"></i>  Join Us With Google </a>
                           
                                 <a href="{{ url('/login/facebook') }}" class="btn btn-primary" style="background-color:#3b5998"><i class="fa fa-facebook-f fa-lg" aria-hidden="true" style="padding:6px"></i> Join Us With Facebook</a>
                                 
                            </div>
                        </div>    

                    </div>                     
                </div>  
            </div>


                   
                   
                    
             </div> 
        </div>
@endsection
