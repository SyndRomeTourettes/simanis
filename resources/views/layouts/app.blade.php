<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sistem Monitoring Inventaris">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>{{config('app.name')}} | @yield('title')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('theme/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('theme/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('theme/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- sweetalert -->
  <link rel="stylesheet" href="{{asset('theme/alert/css/sweetalert2.css')}}">
  <!-- jQuery -->
  <script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- sweetalert -->
  <script src="{{asset('theme/alert/js/sweetalert2.js')}}"></script>
  <link rel="stylesheet" href="{{asset('theme/dist/css/switch.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
 <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img  src="{{asset('loading.gif')}}" alt="loading" height="60" width="60">
  </div>

    @include('layouts.navbar')
    @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

         <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="{{asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('theme/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('theme/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('theme/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('theme/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('theme/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('theme/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('theme/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('theme/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('theme/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('theme/dist/js/pages/dashboard.js')}}"></script> -->
<!-- <script src="//cdn.jsdelivr.net/npm/eruda"></script>
<script>eruda.init();</script> -->
</body>
</html>