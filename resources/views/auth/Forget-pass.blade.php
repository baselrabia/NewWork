@extends('layouts.app')

@section('content')
  <div class="container" style="padding-top: 30px">    
            <div id="loginbox" style="margin-top:50px;  margin-bottom: 90px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title"> Forget Password </div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                        </div>     

                        <div style="padding-top:30px ;" class="panel-body" >

                            @include('layouts.messages')
                                                        
                           <form class="form-horizontal " action="{{ route('reset') }}"  method="POST" id="loginform" role="form">
                            {{ csrf_field() }}
                                        
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="username or email">                                        
                                </div>
                                    
                           
                 

                       
                                        

                                    <div style="margin-top:10px; text-align: center;" class="form-group ">

                                        <div class="col-sm-12 controls">
                                          <button id="btn-login"  type="submit" class="btn btn-success">Send Email</button>
                                         
                                        </div>

                                    
                             </form> 
                            

                    </div>     
                    <p class="text-center" style="margin-top: 15px;"><small><a href="{{ route('reset.security') }}">Reset By Security Question ?</a></small></p>
                                    
                </div>  
            </div>


                   
                   
                    
             </div> 
        </div>
@endsection
