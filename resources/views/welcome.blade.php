<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DATN</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-5.6.1.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    @yield('styles')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/highcharts/highstock.js')}}"></script>
    <script src="{{ asset('js/highcharts/highcharts-more.js')}}"></script>
    <script src="{{ asset('js/demo.js')}}"></script>
    @yield('script-files')
</head>
<body>
<div class="row">
    <div class="col-4" id="id-chart"></div>
    <div class="col-4" id="id-chart-2"></div>
    <div class="col-4" id="id-chart-3"></div>
</div>
<div class="row" style="margin-top: 20px">
    <div class="col-4" id="id-chart-4"></div>
    <div class="col-4" id="id-chart-5"></div>
    <div class="col-4" id="id-chart-6"></div>
</div>
</body>
@yield('js')
</html>
