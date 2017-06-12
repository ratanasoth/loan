<?php $lang = Auth::user()->language .".php"; ?>
<?php include(app_path()."/lang/". $lang); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Loan Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <script>
    var burl = "{{url('/')}}";
    // set current date
    var d = new Date();
    var m = d.getMonth()+1;
    m = m<10?"0"+m:m;
    var day = d.getDate();
    day = day<10?"0"+day:day;
    var dd =d.getFullYear() + "-" + m + "-" + day;
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>One</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vdoo</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="btnSideBar">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('photo/'.Auth::user()->photo)}}" class="user-image">
              <span class="hidden-xs">{{Auth::user()->email}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('photo/'.Auth::user()->photo)}}" class="img-circle">
                <p>
                  {{Auth::user()->name}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/logout')}}" class="btn btn-danger btn-flat">{{$logout}}</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php
      $sg1 = Request::segment(1);
      $sg2 = Request::segment(2);
      $security = array('user','role','permission','permissionrole', 'module');
      $setting = array('province','district','commune','village', 'company', 'branch','department','position','loancategory');
      ?>
      <!-- Sidebar user panel -->
      <div class="user-panel">

      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="{{$sg1=='home'?'active':''}}">
          <a href="{{url('/home')}}">
            <i class="fa fa-dashboard text-primary"></i> <span>{{$dashboard}}</span>
          </a>
        </li>
        <li class="treeview <?php if (in_array($sg1, $security)) { echo 'active'; } ?>">
          <a href="#">
            <i class="fa fa-key text-danger"></i> <span>{{$security_menu}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{$sg1=='user'?'active':''}}"><a href="{{url('/user')}}"><i class="fa fa-user text-primary"></i> {{$user}}</a></li>
            <li class="{{$sg1=='role'?'active':''}}"><a href="{{url('/role')}}"><i class="fa fa-road text-info"></i> {{$role_permission}}</a></li>
          </ul>
        </li>
        <li class="treeview <?php if (in_array($sg1, $setting)) { echo 'active'; } ?>">
          <a href="#">
            <i class="fa fa-cog text-success"></i> <span>{{$settings}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{$sg1=='province'?'active':''}}"><a href="{{url('/province')}}"><i class="fa fa-map-marker"></i> {{$province}}</a></li>
            <li class="{{$sg1=='district'?'active':''}}"><a href="{{url('/district')}}"><i class="fa fa-tag"></i> {{$district}}</a></li>
            <li class="{{$sg1=='commune'?'active':''}}"><a href="{{url('/commune')}}"><i class="fa fa-reorder"></i> {{$commune}}</a></li>
            <li class="{{$sg1=='village'?'active':''}}"><a href="{{url('/village')}}"><i class="fa fa-star"></i> {{$village}}</a></li>
            <li class="{{$sg1=='company'?'active':''}}"><a href="{{url('/company')}}"><i class="fa fa-building"></i> {{$company}}</a></li>
            <li class="{{$sg1=='branch'?'active':''}}"><a href="{{url('/branch')}}"><i class="fa fa-location-arrow"></i> {{$branch}}</a></li>
            <li class="{{$sg1=='department'?'active':''}}"><a href="{{url('/department')}}"><i class="fa fa-stop"></i> {{$department}}</a></li>
            <li class="{{$sg1=='position'?'active':''}}"><a href="{{url('/position')}}"><i class="fa fa-shield"></i> {{$position}}</a></li>
            <li class="{{$sg1=='loancategory'?'active':''}}"><a href="{{url('/loancategory')}}"><i class="fa fa-shield"></i> {{$loan_category}}</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      @yield('content')
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <p class="text-center">Copy&copy; 2017 by Vdoo, <a href="http://www.vdoo.biz" target="_blank">www.vdoo.biz</a></p>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@yield('js')
</body>
</html>
