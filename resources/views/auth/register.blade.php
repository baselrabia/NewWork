@extends('layouts.app')
@section('style')
        <style type="text/css">
            .target-holder{
                background:#fff;
                box-shadow:1px 1px 3px rgba(128,128,128,0.4);
                padding: 30px 15px;
            }
            .co-success{
                color: #5cb85c
            }
            .mt-20{
                margin-top:20px;
            }
        </style>
@endsection        
@section('content')


        <div class="container-fluid" style="margin-top: 67px;">
            <div class="row">
               <div class="col-md-3"></div>
                <div class="col-12 col-md-6">
                    <div class="target-holder">
                        <h4 class="text-center"><b>Create New User</b></h4>
                         @include('layouts.messages')


                        <form action="{{ route('register') }}" class="mt-20" method="POST" autocomplete="off">
                            {{csrf_field()}}
                            
                            <div class="form-group">
                                            <label for="first_name"> First Name </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="John" name="first_name" value="{{ old('first_name')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="last_name"> Last Name </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Doe" name="last_name" value="{{ old('last_name')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                            <label for="username"> Username </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Ex : User_name" name="username" value="{{ old('username')}}" required>
                                </div>
                            </div>
                           <div class="form-group">
                                    <label for="Email"> Email </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" required placeholder="example@example.com" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="Password"> Password </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="password_confirmation"> Password Confirmation </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="phone"> Phone </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="phone" class="form-control" placeholder="Type Your Phone" name="phone" value="{{ old('phone')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Location"> Location </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="United States" name="location" value="{{ old('location')}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sec_question"> Security Question </label>
                                        <select class="form-control" name="sec_question">
                                          <option selected disabled>Pick Up A Question</option>
                                            <option value="who_is_your_favorite_doctor_or_teacher">Who is your favorite Doctor Or Teacher ?</option>
                                          <option value="where_are_you_from">Where Are you from?</option>
                                          <option value="what_is_your_hobby">What is your hobby?</option>
                                          <option value="what_is_your_favorite_car">What is your favorite car ?</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="sec_answer"> Answer The Question</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="text" class="form-control" placeholder="Answer The Question" name="sec_answer" required value="{{ old('sec_answer') }}">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                    <label for="dob"> Date Of Birth </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                            <input type="date" class="form-control" name="dob" required value="{{ old('dob') }}">

                                        </div>
                                    </div>
                            
                            <div class="form-group">
                                 <label for="gender"> Gender </label>
                                    <div class="input-group">
                                           <input type="radio" value="male" id="male" name="gender">
                                            <label for="male">Male</label>
                                            <input type="radio" id="female" name="gender" value="female" style="margin-left: 30px">
                                            <label for="female">Female</label>
                                    </div>                               
                            </div>

                            <div class="form-group" style="padding:10px 0 10px 0;">
                                <button type="submit" class="btn btn-primary form-control">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    Register
                </button>
                                
                                    
                            </div>

                        </form>
                        <hr>

                        <p class="text-center">Already A member ?<small><a href="{{ route('login') }}"> Login</a></small></p> 
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
@endsection
