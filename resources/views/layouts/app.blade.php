<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    @yield('style')

</head>
<body>
    <div id="app">
         @include('layouts.navbar')

       

        <main class="py-4">
            @yield('content')
        </main>
    </div>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <h4><b>ITO Valley</b></h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms and Cnditions</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <h4><b>jobs</b></h4>
                        <ul>
                            <li><a href="#">Local Jobs</a></li>
                            <li><a href="#">Jobs By Location</a></li>
                            <li><a href="#">Jobs By Category</a></li>
                            <li><a href="#">Jobs With My Skills</a></li>
                            <li><a href="#">Jobs By Top Employers</a></li>
                        </ul>
                    </div>
                    <div class="clearfix visible-xs"></div>
                    <div class="col-xs-6 col-sm-3">
                        <h4><b>employer</b></h4>
                        <ul>
                            <li><a href="#">Post A New Job</a></li>
                            <li><a href="#">Browse Employers</a></li>
                            <li><a href="#">Jobs By Category</a></li>
                            <li><a href="#">Jobs With My Skills</a></li>
                            <li><a href="#">Jobs By Top Employers</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <h4><b>social</b></h4>
                        <ul class="social">
                            <li><a href="#"><span class="fa fa-facebook-official"></span> /itovalley</a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span> /itovalley</a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span> /itovalley</a></li>
                            <li><a href="#"><span class="fa fa-google-plus-square"></span> /itovalley</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="text-center rights">
                2017 © ITOValley. All Rights Reserved | Privacy Policy
            </div>
        </footer>



        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Go To Top" data-toggle="tooltip" data-placement="left"><span class="fa fa-angle-double-up"></span></a>


    <!-- Scripts -->

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    @yield('script')

</body>
</html>
