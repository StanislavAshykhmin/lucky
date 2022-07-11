<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>{{config('app.name')}}</title>
    @include('user.parts.header-style')
    @stack('styles')
</head>
<body class="horizontal-layout horizontal-menu content-left-sidebar navbar-floating footer-static  menu-expanded pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="">
@include('user.parts.header')
<div class="app-content content " id="app">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@include('user.parts.footer')
<!-- END: Content-->
@include('user.parts.footer-scripts')
@stack('scripts')
</body>
<!-- END: Body-->

</html>
