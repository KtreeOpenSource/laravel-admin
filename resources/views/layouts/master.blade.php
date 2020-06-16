<!DOCTYPE html>
<html>
<head>
    <base src="{{ URL::asset('/') }}" />
    <meta charset="UTF-8">
    <title>
        @section('title')
            @setting('core::site-name') | Admin
        @show
    </title>
    <meta id="token" name="token" value="{{ csrf_token() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-api-token" content="{{ $currentUser->getFirstApiKey() }}">
    <meta name="current-locale" content="{{ locale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    @foreach($cssFiles as $css)
        <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset($css) }}">
    @endforeach

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/dist/css/skins/" . config('admin.skin') .".css") }}">

    {!! Admin::css() !!}

    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/jquery-ui/jquery-ui.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/laravel-admin/laravel-admin.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/nprogress/nprogress.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/sweetalert/dist/sweetalert.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/nestable/nestable.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/toastr/build/toastr.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/bootstrap3-editable/css/bootstrap-editable.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/google-fonts/fonts.css") }}">


    {!! Theme::script('vendor/jquery/jquery.min.js') !!}
    @include('admin::partials.asgard-globals')
    @include('admin::partials.popupMessage')
    @section('styles')
    @show
    @stack('css-stack')
    @stack('translation-stack')

    <script>
        $.ajaxSetup({
            headers: { 'Authorization': 'Bearer {{ $currentUser->getFirstApiKey() }}' }
        });
        var AuthorizationHeaderValue = 'Bearer {{ $currentUser->getFirstApiKey() }}';
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    @routes
</head>
<body class="hold-transition {{config('admin.skin')}} {{join(' ', config('admin.layout'))}}">
<div class="wrapper" id="app">
    <header class="main-header">
      <a href="{{ route('dashboard.index') }}" class="logo">
            <span class="logo-mini">
                @setting('core::site-name-mini')
                <img src=<?php echo url('/images/logo-icon.png') ?>  alt="Logo-Icon">
            </span>
            <span class="logo-lg">
                @setting('core::site-name')
                <img src=<?php echo url('/images/logo.png') ?>  alt="Logo">
            </span>
        </a>
        @include('admin::partials.top-nav')
    </header>
    @include('admin::partials.sidebar-nav')

    <aside class="content-wrapper"  id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @include('admin::partials.error')
            @include('admin::partials.success')
            @include('admin::partials.exception')
            @include('admin::partials.toastr')
            @yield('content')
            {!! Admin::script() !!}
            <router-view></router-view>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
    @include('admin::partials.footer')
    @include('admin::partials.right-sidebar')
</div><!-- ./wrapper -->

@foreach($jsFiles as $js)
    <script src="{{ URL::asset($js) }}" type="text/javascript"></script>
@endforeach

<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
</script>

<script src="{{ asset('js/app.js') }}"></script>

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ admin_asset ('/vendor/laravel-admin/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/nprogress/nprogress.js') }}"></script>

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ admin_asset ('/vendor/laravel-admin/nestable/jquery.nestable.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/toastr/build/toastr.min.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
<script src="{{ admin_asset ('/vendor/laravel-admin/sweetalert/dist/sweetalert.min.js') }}"></script>
{!! Admin::js() !!}
<script src="{{ admin_asset ('/vendor/laravel-admin/laravel-admin/laravel-admin.js') }}"></script>

<script src="{{ asset('js/echo.js') }}"></script>

<?php if (is_module_enabled('Notification')): ?>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="{{ Module::asset('notification:js/pusherNotifications.js') }}"></script>
    <script>
        $(".notifications-list").pusherNotifications({
            pusherKey: '{{ env('PUSHER_KEY') }}',
            loggedInUserId: {{ $currentUser->id }}
        });
    </script>
<?php endif; ?>

<?php if (config('asgard.core.core.ckeditor-config-file-path') !== ''): ?>
    <script>
        $('.ckeditor').each(function() {
            CKEDITOR.replace($(this).attr('name'), {
                customConfig: '{{ config('asgard.core.core.ckeditor-config-file-path') }}'
            });
        });
    </script>
<?php endif; ?>
@section('scripts')
@show
@stack('js-stack')
</body>
</html>
