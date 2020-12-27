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
                            <div id="block-status" class="row spBlock m0l m30r w-auto h-100 p10b">
                                <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                                    <label class="m0 text-white fs16">Độ tuổi</label>
                                </div>
                                <div class="centered p0 bg-white m10r">
                                    <select id="select-zcore-chart" class="form-control change-zscore" name="table_type">
                                        @foreach(TYPE_POPULATION_NAME as $key => $value)
                                            @if(in_array($key, ARRAY_CHILDREN))
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                                    <label class="m0 text-white fs16">Năm</label>
                                </div>
                                <div class="centered p0 bg-white">
                                    <select class="form-control change-zscore" name="year_1">
                                        @for($i = 2018; $i > 1999; $i--)
                                            <option value="{{ $i }}" @if($i == 2008) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="centered p0 bg-white">
                                    <select class="form-control change-zscore" name="year_2">
                                        @for($i = 2018; $i > 1999; $i--)
                                            <option value="{{ $i }}" @if($i == 2018) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div id="id-chart-zscore"></div>
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
                            <div id="block-status" class="row spBlock m0l m30r w-auto h-100 p10b">
                                <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                                    <label class="m0 text-white fs16">Năm</label>
                                </div>
                                <div class="centered p0 bg-white">
                                    <select id="change-pie" class="form-control change-pie" name="year">
                                        @for($i = 2018; $i > 1999; $i--)
                                            <option value="{{ $i }}" @if($i == 2018) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div id="id-chart-pie"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-8 p0">
                <div class="item-block-property m15l">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="block-status" class="row spBlock m0l m30r w-auto h-100 p10b">
                                <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                                    <label class="m0 text-white fs16">Độ tuổi</label>
                                </div>
                                <div class="centered p0 bg-white">
                                    <select id="select-column-chart" class="form-control" name="table_type">
                                        @foreach(TYPE_POPULATION_NAME as $key => $value)
                                            @if(in_array($key, ARRAY_CHILDREN))
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="id-chart-sdd"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m0">
            <div class="col-6 col-lg-6 p0">
                <div class="item-block-property m15r">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="id-chart-weight"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 p0">
                <div class="item-block-property m15r">
                    <div class="m0 m30b diagram-analysisu">
                        <div class="col-12 p30 m25b diagram-block bg-white">
                            <div id="id-chart-height"></div>
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
