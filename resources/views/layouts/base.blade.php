<!DOCTYPE html>
<html lang="DATN">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-5.6.1.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.standalone.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom/common.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    @yield('styles')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <script src="{{ asset('js/highcharts/highstock.js')}}"></script>
    <script src="{{ asset('js/cleave.js')}}"></script>
    <script src="{{ asset('js/custom/common.js')}}"></script>
    @yield('script-files')
</head>
<body>
<div id="wrapper">
    @include('layouts/header')
    <div id="wrapper-content" class="wrapper-content">
        @include('layouts/sidebar')
        <div class="container-fluid container-wrapper p0 p30t" style="background-color: #f0f1f2!important">
            <div class="container-info">
            @yield('content')
        </div>
        </div>
    </div>
</div>
</body>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    @if( \Illuminate\Support\Facades\Session::has(STR_SUCCESS_FLASH) )
    toastr.success("{{ \Illuminate\Support\Facades\Session::get(STR_SUCCESS_FLASH) }}");
    @elseif( \Illuminate\Support\Facades\Session::has(STR_ERROR_FLASH) )
    toastr.error("{!! \Illuminate\Support\Facades\Session::get(STR_ERROR_FLASH) !!}");
    @endif
</script>
@yield('js')
</html>
