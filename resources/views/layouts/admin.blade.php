<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Laravel Blog')</title>
    <link rel="stylesheet" href="{{asset('admin/dist/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/styles.css')}}">
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
     @include('includes.admin.headerNavigation')
     
        @include('includes.admin.sidebarNavigation')

       @yield('content')
</div>
    <script src="{{asset('admin/dist/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/dist/vendor/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('admin/dist/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/dist/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/carbon.js')}}"></script>
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
</body>
</html>
