<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ admin_base_path('/') }}" class="logo">
	<?php echo {{ admin_base_path('/') }} ?>
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('admin.logo-mini', config('admin.name')) !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('admin.logo', config('admin.name')) !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                {!! Admin::getNavbar()->render() !!}

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ $user->present()->gravatar() }}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ $user->present()->fullname() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ $user->present()->gravatar() }}" class="img-circle" alt="User Image">

                            <p>
                                {{ $user->present()->fullname() }}
                                <small>Member since admin {{ $user->created_at }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ admin_base_path('auth/setting') }}" class="btn btn-default btn-flat">{{ trans('admin.setting') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ admin_base_path('auth/logout') }}" class="btn btn-default btn-flat btn-logout">{{ trans('admin.logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>

	<div class="page-head">
	<div class="row">
	<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Alexander Pierce</h3>
              <h5 class="widget-user-desc">Founder &amp; CEO</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="/images/user1-128x128.jpg" alt="User Avatar">
            </div>
			<div class="widget-user-time  bg-aqua-active">
               <ul><li><i class="fa fa-clock-o" aria-hidden="true"></i> 11.05 AM</li><li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> 25.01.2018</li><li><i class="fa fa-map-pin" aria-hidden="true"></i> NY</li></ul>
            </div>

            <div class="box-footer">
              <div class="row">

                <div class="col-sm-4 col-xs-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header" style="    color: #da8a0b;">50</h5>
                    <span class="description-text"><i class="fa fa-times" style="    color: #da8a0b;"></i> Pending Task</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header" style="    color: green;">550</h5>
                    <span class="description-text"><i class="fa fa-check-circle-o" aria-hidden="true" style="    color: green"></i> Completed Tasks</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-4">
                  <div class="description-block">
                    <h5 class="description-header" style="color: #008caf;">600</h5>
                    <span class="description-text"><i class="fa fa-plus-circle" aria-hidden="true" style="color: #008caf;"></i> Total Tasks</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
				 <div class="col-sm-12">
			  <div class="widget-user-details">
             <ul><li><a  data-toggle="tooltip" title="Click to call"><i class="fa fa-phone"></i></a></li><li><a data-toggle="tooltip" title="E-mail"><i class="fa fa-envelope"></i><span class="label label-success">4</span></a></li><li><a data-toggle="tooltip" title="Tax payment notification"><i class="fa fa-file"></i><span class="label label-warning">5</span></a></li><li><a data-toggle="tooltip" title="Error log"><i class="fa fa-times"></i><span class="label label-danger">3</span></a></li></ul>

            </div>
            </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      <!-- Your Page Content Here -->
	   <div class="col-md-8 col-sm-12 col-xs-12 p0">
	 <div class="col-md-4 col-sm-12 col-xs-12 inform">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-cart-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Services Cart</span>
              <span class="info-box-number">03/20</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-12 col-xs-12 inform">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">GST DASHBOARD</span>
              <span class="info-box-number">12/50</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-12 col-xs-12 inform">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">IT DASHBOARD</span>
              <span class="info-box-number">11/70</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		<div class="col-md-12 col-sm-6 col-xs-12 flow-chart p0">
		<div class="col-md-2 col-sm-4 col-xs-6">
		<div class="check hold"> <img src="/images/check.png" alt="check" ></div>
		 <h4>GSTIN Validations</h4>
        </div>
		<div class="col-md-2 col-sm-4 col-xs-6">
		 <div class="follow hold"><img src="/images/follow.png" alt="follow" ></div>
		 <h4>Missing ITC Follow-up</h4>
        </div>
		<div class="col-md-2 col-sm-4 col-xs-6">
		<div class="bills hold"> <img src="/images/truck.png" alt="truck" ></div>
		 <h4>E-Way Bills</h4>
        </div>
		<div class="col-md-2 col-sm-4 col-xs-6">
		 <div class="recieve hold"><img src="/images/tds.png" alt="TDS" ></div>
		 <h4>TDS Dashboard</h4>
        </div>
		<div class="col-md-2 col-sm-4 col-xs-6">
		 <div class="reg hold"><img src="/images/expert.png" alt="Expert Advise"></div>
		 <h4>Expert Advice</h4>
        </div>
		<div class="col-md-2 col-sm-4 col-xs-6">
		 <div class="process hold"><img src="/images/processing.png" alt="processing" ></div>
		 <h4>Bank Loan Processing</h4>
        </div>
        </div>
        </div>
	</div>
	</div>
</header>
