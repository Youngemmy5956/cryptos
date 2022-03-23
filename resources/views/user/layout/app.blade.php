<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Mar 2022 00:29:17 GMT -->

<head>

    <meta charset="utf-8" />
    <title>{{$title ?? ""}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose user & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('user/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('user/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('user/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('style')

    <style>
        .plan {
            text-align: right;
        }
      
    </style>

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('user.layout.includes.header')


        <!--- Sidemenu -->
        @include('user.layout.includes.left_side_bar')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('user.layout.includes.footer')
    </div>

    </div>

    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('user.layout.includes.scripts')
    @yield('scripts')
</body>

</html>
