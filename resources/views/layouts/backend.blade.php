<?php 
    $route = Request::route()->getName();
    function activeMenu($route, $routeName)
    {
      if(is_array($routeName)){
           if(in_array($route,$routeName)){
            return 'active';            
           }
      }
      else{
        if($route == $routeName){
          return 'active';
        }
      }
       return false;
    }
    
    function openMenu($route, $routeName)
    {
      if(is_array($routeName)){
           if(in_array($route,$routeName)){
            return 'menu-open';            
           }
      }
      else{
        if($route == $routeName){
          return 'menu-open';
        }
      }
       return false;
    }
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/adminlte.min.css')}}">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/css/countrySelect.min.css" integrity="sha512-HHSUgqDtmyVfGT0pdLVRKcktf9PfLMfFzoiBjh9NPBzw94YFTS5DIwZ12Md/aDPcrkOstXBp9uSAOCl5W2/AOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">

  @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-user"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="sidebar">
      <a href="{{ url('/') }}" class="brand-link">
        <!-- <img src="" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">BOYA</span>
      </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://i.pinimg.com/474x/76/4d/59/764d59d32f61f0f91dec8c442ab052c5.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome, {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('home')}}" class="nav-link <?php echo activeMenu($route, ['home']); ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php echo openMenu($route, ['activity.create', 'activity.index', 'activity.edit']); ?>">
            <a href="{{ route('activity.create')}}" class="nav-link <?php echo activeMenu($route, ['activity.create', 'activity.index', 'activity.edit']); ?>">
            <i class="fa fa-tasks" aria-hidden="true"></i>
              <p>
                &nbsp;Activities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('activity.create')}}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Activity</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('activity.index')}}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Activities</p>
                </a>
              </li>
            </ul>
          </li>

          @role('Admin')
          <li class="nav-item has-treeview <?php echo openMenu($route, ['users.create', 'users.index', 'users.edit']); ?>">
            <a href="#" class="nav-link <?php echo activeMenu($route, ['users.create', 'users.index', 'users.edit']); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.create')}}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index')}}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo openMenu($route, ['company.create', 'company.index', 'company.edit']); ?>">
            <a href="#" class="nav-link <?php echo activeMenu($route, ['company.create', 'company.index', 'company.edit']); ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Company
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('company.create')}}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Company</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('company.index')}}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Company</p>
                </a>
              </li>
            </ul>
          </li>
          @endrole

          <li class="nav-item">
            <a href="coupons" class="nav-link">
            <i class="fab fa-buffer"></i>
              <p>Coupons</p>
            </a>
          </li>
            <a href="{{ route('settings.profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Starter Page</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <div class="bs-example" id="toastr_div">    
      
  </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
        <ul>
            <li>
            Welcome, {{ Auth::user()->name }}
            </li>
        {{-- </a> --}}

        {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
        <li>
            <a class="logout-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
    </ul>
        {{-- </div> --}}

    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');?> BOYA.<br>All rights reserved.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/bower_components/admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/bower_components/admin-lte/dist/js/adminlte.min.js')}}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/js/countrySelect.min.js" integrity="sha512-criuU34pNQDOIx2XSSIhHSvjfQcek130Y9fivItZPVfH7paZDEdtAMtwZxyPq/r2pyr9QpctipDFetLpUdKY4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('script')
</body>
</html>
