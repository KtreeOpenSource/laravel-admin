<?php
use Modules\Customer\Helpers\CustomerHelper;
use Modules\Core\Helpers\StorageUtility;
use Modules\User\Entities\UserRoles;

$notifications = CustomerHelper::getNotifications();
// $notifications = '';
$legalName = Auth::user()->employeeName;
$timestamp = Auth::user()->createdAt;
$id = Auth::user()->id;
$role_id = UserRoles::where('user_id',$id)->pluck('role_id')->toArray();
$roleId = isset($role_id[0]) ? $role_id[0] : '';
$desig = DB::table('user__roles')->where('id',$roleId)->pluck('name');
$designation = isset($desig[0]) ? $desig[0] : '';
$regDate = date("F jS, Y", strtotime($timestamp));

$avatar = Auth::user()->avatar;
?>
<nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <h1 class="hidden-xs hidden-sm current-page-title"> Dashboard </h1>
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
                      <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image"> </div>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{($notifications) ? $notifications->count() : 0}}</span> </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{($notifications) ? $notifications->count() : 0}} notifications</li>
              @if($notifications)
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">

                    @foreach($notifications as $notification)
                        <?php $notificationsData = $notification->data; ?>
                        @if(isset($notificationsData['serviceRequestId']) && isset($notificationsData['comment']) && isset($notificationsData['status']))
                          <li><!-- start notification -->
                            <a href="{{(isset($notificationsData['requestId'])) ? route('admin.requests.requestServices.showPendingSubmission', [$notificationsData['requestId'], $notification->id]) : '#'}}">
                                <i class="fa fa-users text-aqua"></i>
                                {{$notificationsData['serviceRequestId']. ' service request id status is updated to '.$notificationsData['status'].
                                ' with comment '.$notificationsData['comment']}}
                            </a>
                          </li>
                        @endif
                    @endforeach

                  <!-- end notification -->
                </ul>
              </li>

              <?php
                $notifications = $notifications->toArray();
                $requestIds = array_filter(array_column(array_column($notifications, 'data'), 'requestId'));
                $requestIds = array_unique($requestIds);
              ?>
              @if($requestIds)
              <li class="footer notification-footer">
                <a class="pull-left  btn btn-default" href="{{route('admin.requests.markAllRead', implode(',', $requestIds))}}">Mark all read</a>
                <a class="pull-right  btn btn-default" href="{{route('admin.requests.requestServices.pendingSubmission', implode(',', $requestIds))}}">View all</a>
              </li>
              @endif
              @endif
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
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <?php if ($avatar) {?>
                <img src="<?= StorageUtility::getUrl($avatar)?>" class="user-image" alt="User Image">
            <?php } else {?>
                <img src="{{asset('images/user2-160x160.jpg')}}" class="user-image" alt="User Image">
            <?php } ?>

            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs hidden-sm user-name"><?php echo $legalName; ?></span> </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php if ($avatar) {?>
                    <img src="<?= StorageUtility::getUrl($avatar)?>" class="img-circle" alt="User Image">
                <?php } else {?>
                    <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                <?php echo $legalName;?>  <?php if($designation != " "){ echo '-  '. $designation;}?>
                  <small>Member since <?php echo $regDate;?></small>
                </p>
                <!-- <p> Alexander Pierce - Web Developer <small>Member since Nov. 2012</small> </p> -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> <a href="{{ route('admin.user.user.edit',$id) }}" class="btn btn-default btn-flat">Profile</a> </div>
                <div class="pull-right"> <a href="{{ route('logout') }}" class="btn btn-default btn-flat">
                  {{ trans('core::core.general.sign out') }}</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> </li>-->
        </ul>
      </div>
      <div class="questions-section">Customer Care : <a href="#">90 300 16161</a> 10AM - 6PM</div>
    </nav>
