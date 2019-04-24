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
                        <h2 class="text-center"><b>Roles Dashboard</b></h2>
                        <hr>
                        <table class="table table-bordered table-striped">
                              <tr>
                                  <th>Role ID</th>
                                  <th>Role Name</th>
                                  <th>Role slug</th>
                                  <th>Role permissions</th>
                              </tr> 

                              @foreach($roles as $role)
                              <tr>
                                  <td>{{ $role->id  }}</td>
                                  <td>{{ $role->name  }}</td>
                                  <td> {{ $role->slug  }}</td>
                                  <td><ul> 
                                    @foreach( $role->permissions as $permission => $value)
                                    <li>{{ $permission }} :  @if($value == 1) true @else false @endif </li>
                                    @endforeach
                                  </ul></td>
                              </tr>
                                  @endforeach
                            </table>

                         
                         


                         <form action="{{ route('roles') }}" class="mt-20" method="POST" autocomplete="off">
                            {{csrf_field()}}

                        <h1> Creat New Role</h1>
                        <hr>@include('layouts.messages')

                         <div class="form-group">
                                            <label for="slug"> Slug Of Role </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="admin" name="slug" value="{{ old('slug')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="name"> Name Of Role </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Administrator" name="name" value="{{ old('name')}}" required>
                                </div>
                            </div>

                    <div class="form-group">
                        <label for="permissions"> Permissions </label>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"  name="permissions[]" value=".create">
                            create
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"  name="permissions[]" value=".show">
                            show
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="permissions[]" value=".edit">
                            edit
                          </label>
                        </div> 
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="permissions[]" value=".approve">
                            approve
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="permissions[]" value=".delete">
                            delete
                          </label>
                        </div>
                        </div>
                       
                       
                              <div class="form-group" style="padding:10px 0 10px 0;">
                                <button type="submit" class="btn btn-primary form-control">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    Creat Role
                </button>
                                
                                    
                            </div>
                            </form>


              


                     



                    </div>
                </div>
            </div>
        </div>
@endsection
