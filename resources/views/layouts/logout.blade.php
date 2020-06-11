<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            {{ Setting::get('core::site-name') }} | Customer Portal
        @show
    </title>
    <link rel="shortcut icon" href="{{url('/images/logo-icon.png')}}"><!-- kt170 for title logo-->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Customerportal_css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/Customerportal_css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Customerportal_css/reset.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/Customerportal_css/responsive.css')}}">
	<link rel="stylesheet" href="{{ asset("/vendor/laravel-admin/AdminLTE/dist/css/skins/" . config('admin.skin') .".min.css") }}">

    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/ionicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/alertify/alertify.core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/admin-lte/plugins/iCheck/square/blue.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-admin/toastr/build/toastr.min.css') }}">
    <script src="{{ asset('themes/adminlte/vendor/jquery/jquery.min.js') }}"></script>

</head>
<body class="hold-transition {{config('admin.skin')}} {{join(' ', config('admin.layout'))}}">
  <div class="wrapper logout-page" id="app">
    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <span class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset('images/logo-icon.png')}}"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset('images/logo.png')}}" alt="logo"></span> </span>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <!--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>-->
        <!--<h1 class="hidden-xs hidden-sm current-page-title"> Dashboard </h1>-->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i> <span class="label label-success">4</span> </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li>
                      <!-- start message -->
                      <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="../../images/user2-160x160.jpg" class="img-circle" alt="User Image"> </div>
                      <!-- Message title and timestamp -->
                      <h4> Support Team <small><i class="fa fa-clock-o"></i> 5 mins</small> </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                      </a> </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span class="label label-warning">10</span> </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li>
                      <!-- start notification -->
                      <a href="#"> <i class="fa fa-users text-aqua"></i> 5 new members joined today </a> </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-calendar"></i> <span class="label label-danger">9</span> </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                      <!-- Task title and progress text -->
                      <h3> Design some buttons <small class="pull-right">20%</small> </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">20% Complete</span> </div>
                      </div>
                      </a> </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer"> <a href="#">View all tasks</a> </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!--<li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> </li>-->
          </ul>
        </div>
        <div class="questions-section">Customer Care : <a href="tel:9030016161">90 300 16161</a> 10AM - 6PM</div>
      </nav>
    </header>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper contant-adjust">
    <div class="container">
      <div class="row">


          <div class="col-md-6 logout-part effect2"  align="center">
			  <!-- carousel starts -->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  <div class="item active">
					  <img src="../../images/log-out-banner-new.jpg" alt="...">

					</div>
				  <div class="item">
					  <img src="../../images/log-out-banner-2.jpg" alt="...">

					</div>
					<div class="item">
					  <img src="../../images/log-out-banner-3.jpg" alt="...">

					</div>


				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
			</div>
						  <!--ends here-->
              @yield('content')
          </div>
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
      </div>

      @yield('footer')
      <strong>Copyright © {{ date('Y')}} <a href="https://gst-bhaswa.com/home.html" target="_blank">GST-BHASWA.</a></strong><span> All rights reserved.</span>
  </footer>
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- Bootstrap -->
<script src="{{ asset('themes/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/js/vendor/alertify/alertify.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/toastr/build/toastr.min.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/AdminLTE/dist/js/app.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
@section('scripts')
@show
@stack('js-stack')
</body>
</html>
