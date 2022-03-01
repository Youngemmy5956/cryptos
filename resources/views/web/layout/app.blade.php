<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('data/css/style.css')}}"
    <link rel="icon" href="{{asset('data/images/coininvest.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>coinvestcryptos.com</title>
</head>

<body>
        <!-- this is the header section that contains the logo and the navigation bars   -->
        @include('web.layout.includes.header')
        <!-- end of the header section -->

        <!-- this is the beginning of the landpage section ie first-site of the website  -->
        @yield('content')
        <!-- footer section -->
        @include('web.layout.includes.footer')
        @include('web.layout.includes.scripts')
</body>
