@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thống kê dinh dưỡng</h1>
    </div>

    <div class="display-highcharts m30t">
        <div class="row m0">
            <div class="col-12 col-lg-12 p0">
                <div class="item-block-property">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="id-chart-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m0">
            <div class="col-4 col-lg-4 p0">
                <div class="item-block-property m15r">
                        <div class="m0 m30b diagram-analysisu">
                            <div class="col-12 p30 m25b diagram-block bg-white">
                                <div id="id-chart"></div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-8 col-lg-8 p0">
                <div class="item-block-property m15l">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="id-chart-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m0">
            <div class="col-4 col-lg-4 p0">
                <div class="item-block-property m15r">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="id-chart-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-8 p0">
                <div class="item-block-property m15l">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="id-chart-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('js/statistic.js')}}"></script>
@endsection
