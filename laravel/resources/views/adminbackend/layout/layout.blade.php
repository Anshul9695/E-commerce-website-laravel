<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('/admin-theme/images/favicon.ico')}}" type="image/ico" />

    <title>E-Commerce Admin</title>

    <!-- Bootstrap -->
    <link href="{{asset('/admin-theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/admin-theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('/admin-theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">

    <link href="{{asset('/admin-theme/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/admin-theme/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
     @include('adminbackend.layout.sidebar')
    @include('adminbackend.layout.header')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
        @yield('content')
        

    <!-- jQuery -->
    <script src="{{asset('/admin-theme/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/admin-theme/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  
    <script src="{{asset('/admin-theme/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('/admin-theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

    <script src="{{asset('/admin-theme/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('/admin-theme/build/js/custom.min.js')}}"></script>

    @stack('footer-script')
	
  </body>
</html>
