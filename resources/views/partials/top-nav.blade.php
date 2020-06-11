<?php
use Modules\Customer\Helpers\CustomerHelper;
use Illuminate\Support\Facades\Storage;

$avatar_arr = CustomerHelper::getAvatar();
$taxpayerName_arr = CustomerHelper::getTaxpayerName();
$legalName = isset($taxpayerName_arr[0]) ? $taxpayerName_arr[0] : "";
$imgsrc = isset($avatar_arr[0]) ? Storage::disk('s3')->url($avatar_arr[0]) : "";
// $avat = explode('/',$ava);
// // $avatar1 = $avat[3];
// $avatar= 'avatar2.png';
// $avatar[1] = explode('_',$avatar1);

// $avatar = 'pic.jpg';
$timestamp = Auth::user()->createdAt;
$regDate = date("F jS, Y", strtotime($timestamp));
// print_r($ava);exit();

$notifications = CustomerHelper::getNotifications();
?>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<div class="navbar-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button" style="margin: 0;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
	<h1 class="hidden-xs hidden-sm current-page-title"> Dashboard </h1>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        @if($imgsrc == "")
                        <img src="/images/avatar2.png" class="img-circle" alt="User Image">
                        @else
                        <img src="{{ $imgsrc}}" class="img-circle" alt="User Image">
                        @endif
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{sizeof($notifications)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{sizeof($notifications)}} notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  @if($notifications)
                    @foreach($notifications as $notification)
                        @if(isset($notification['data']['serviceRequestId']) && isset($notification['data']['comment']) && isset($notification['data']['status']))
                          <li><!-- start notification -->
                            <a href="{{isset($notification['data']['requestId']) ? route('admin.dataSubmission.dataUpload', [$notification['data']['requestId'], $notification['id']]) : '#'}}">
                                <i class="fa fa-users text-aqua"></i>
                                {{$notification['data']['serviceRequestId']. ' service request id status is updated to '.$notification['data']['status'].
                                ' with comment '.$notification['data']['comment']}}
                            </a>
                          </li>
                        @endif
                    @endforeach
                  @endif
                  <!-- end notification -->
                </ul>
              </li>
              <?php
                $requestIds = array_filter(array_column(array_column($notifications, 'data'), 'requestId'));
                $requestIds = array_unique($requestIds);
              ?>
              @if($requestIds)
              <li class="footer notification-footer">
                <a class="pull-left  btn btn-default" href="{{route('admin.dataSubmission.markAllRead', implode(',', $requestIds))}}">Mark all read</a>
                <a class="pull-right  btn btn-default" href="{{route('admin.dataSubmission.index', implode(',', $requestIds))}}">View all</a>
              </li>
              @endif
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-calendar"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              @if($imgsrc == "")
              <img src="/images/avatar2.png" class="img-circle user-image" alt="User Image">
              @else
              <img src="{{ $imgsrc }}" class="img-circle user-image" alt="User Image">
              @endif


              <!-- <img src="{{ 'https://ktree-test-space-beta.s3.amazonaws.com'.'/'.$imgsrc }}" class="user-image" alt="User Image"> -->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs hidden-sm user-name"><?php echo $legalName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                @if($imgsrc == "")
                <img src="/images/avatar2.png" class="img-circle" alt="User Image">
                @else
                <img src="{{ $imgsrc }}" class="img-circle" alt="User Image">
                @endif

                <!-- <img src="{{ 'https://ktree-test-space-beta.s3.amazonaws.com'.'/'.$imgsrc }}" class="img-circle" alt="User Image"> -->

                <p>
                <?php echo $legalName;?>
                  <small>Member since <?php echo $regDate;?></small>
                </p>
              </li>
              <!-- <li class="center">
                <p>
                <?php echo $regDate;?>
                </p>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('dashboard.profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">{{ trans('core::core.general.sign out') }}</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
           -->
        </ul>
      </div>
	  <div class="questions-section">Customer Care : <a href="#">90 300 16161</a> 10AM - 6PM</div>
    <!-- kt170 -->
    <div class="idle-time-container" style="color:#fff">
      <div id="idleTimeChecker" style = "display:none">You will be auto logged out in <span id="SecondsUntilExpire"></span> seconds.</div>
    </div>
    <!-- kt170 -->
</div>


</nav>
