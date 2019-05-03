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
                        <div class="panel panel-info" >
                             <div class="panel-heading">
                                <div class="panel-title text-center">Downgrade Users</div>
                                <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                        </div> </div>

                    @include('layouts.messages')
                    <ul class="list-group">
                            @if ($users != NULL)
                                {{-- expr --}}
                            @foreach ($users as $user)
                                <li class="list-group-item" style="height: 350px; max-height:550px"> 
                                      <div class="title h5">
                                            <a href="#"><b>{{ $user->first_name . ' ' . $user->last_name }}</b></a>
                                           
                                            <p><small> {{  $user->roles->first()->name }}</small></p>
                                        </div>
                                    Real Permissions : 
                                   <ul class="list-group" style="display: inline-grid;">
                                        @foreach ($user->roles->first()->permissions as $permission => $value)
                                            @if ($value)
                                                
                                            <li class="list-group-item"> {{$permission .'=>' . 'true'}}</li>
                                            @else
                                                <li class="list-group-item"> {{$permission .'=>' . 'false'}}</li>

                                            @endif
                                        @endforeach
                                    </ul> 
                                @if($user->permissions != NULL)
                                    Updated Permissions :
                                    <ul class="list-group" style="display: inline-grid;">
                                       
                                            @foreach ($user->permissions as $permission => $value)
                                            @if ($value)
                                            <li class="list-group-item"> {{$permission .'=>' . 'true'}}</li>
                                            @else
                                                <li class="list-group-item"> {{$permission .'=>' . 'false'}}</li>

                                            @endif
                                            @endforeach 
                                    </ul>
                                @endif
                                   
                                    
                                    <div class="pull-right">
                                        <form action="{{ route('downgrade.users',$user->username) }}" method="POST">
                                            {{csrf_field()}}
                                            Show : <input type="checkbox" name="list[]" value="show"> | 
                                            Create : <input type="checkbox" name="list[]" value="create"> | 
                                            Edit : <input type="checkbox" name="list[]" value="edit"> | 
                                            Delete : <input type="checkbox" name="list[]" value="delete"> | 
                                            Approve : <input type="checkbox" name="list[]" value="approve"><br>
                                            Permission Level :
                                            <select name="permission_level" >
                                                <option value="admin">Adminstrator</option> 
                                                <option value="moderator">Moderator</option>    
                                                <option value="user">Normal User</option>   
                                            </select>
                                            <input type="submit" value="Downgrade User" class="btn btn-sm">
                                        </form>
                                        
                                    </div>
                                </li>
                            @endforeach
                            @endif
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
@endsection 