<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.layouts.head')
    @yield('title')
    <title>Document</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <div class="content-wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    @yield('content')

        </div>
    @include('admin.layouts.script')
    @yield('script')


    <section class="toast-wrapper flex-row-reverse">
        @include('admin.layouts.toast')
        @include('admin.layouts.sweet_alert_error')
        @include('admin.layouts.sweet_alert_success')
    </section>
</body>
</html>
