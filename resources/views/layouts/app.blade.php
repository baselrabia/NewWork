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


         @include('layouts.footer')


        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Go To Top" data-toggle="tooltip" data-placement="left"><span class="fa fa-angle-double-up"></span></a>


    <!-- Scripts -->

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    @yield('script')

</body>
</html>
