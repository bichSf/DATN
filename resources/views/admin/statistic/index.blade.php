@extends('layouts.base')
@section('content')
    <div class="container-fluid container-wrapper p0 p30t bg-white">
        <div class="container container-info">
            <div class="head">
                <h1 class="text-center fw-bold">Thống kê dinh dưỡng</h1>
            </div>

            <div class="display-highcharts m30t">
                <div class="row m30t">
                    <div class="col-4" id="id-chart"></div>
                    <div class="col-4" id="id-chart-2"></div>
                    <div class="col-4" id="id-chart-3"></div>
                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="col-4" id="id-chart-4"></div>
                    <div class="col-4" id="id-chart-5"></div>
                    <div class="col-4" id="id-chart-6"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('js/demo.js')}}"></script>
@endsection