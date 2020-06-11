<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            {{ Setting::get('core::site-name') }}
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/ionicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/alertify/alertify.core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/admin-lte/dist/css/AdminLTE.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/vendor/admin-lte/plugins/iCheck/square/blue.css') }}"/>
    <link rel="stylesheet" href="{{ admin_asset('/vendor/laravel-admin/toastr/build/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/Customerportal_css/account/reset.css')}}" type="text/css" />
	  <link rel="stylesheet" href="{{ admin_asset('css/Customerportal_css/account/style.css')}}" type="text/css" />
    <link rel="stylesheet" media="screen" href="{{ admin_asset('css/Customerportal_css/account/responsive-leyouts.css')}}" type="text/css" />
    <link rel="stylesheet" media="screen" href="{{ admin_asset('css/Customerportal_css/account/shortcodes.css')}}" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ admin_asset('css/Customerportal_css/account/modalite.min.css')}}">

    <script src="{{ asset('themes/adminlte/vendor/jquery/jquery.min.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition">
<div class="site_wrapper">

    @include('admin::partials.toastr')
    @yield('content')
    <div class="modal fade" id="keyboardShortcutsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ trans('core::core.general.available keyboard shortcuts') }}
                    </h4>
                </div>
                <div class="modal-body">
                    @yield('shortcuts')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="{{ asset('themes/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/js/vendor/alertify/alertify.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/toastr/build/toastr.min.js') }}"></script>
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
