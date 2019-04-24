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

                    @include('layouts.messages')
                    <h1>Welcome To The Admin Panel</h1>
                    </div>
                </div>
            </div>
        </div>
@endsection 