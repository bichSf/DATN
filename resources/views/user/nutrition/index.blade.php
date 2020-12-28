@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Khảo sát dinh dưỡng</h1>
    </div>
    <div class="display-highcharts m30t">
        <form id="form-statistical-population" action="{{ route(USER_STATISTICAL_POPULATION) }}" method="GET">
            <div class="row m0 m30b">
                <div class="col-6">
                    <div id="block-status" class="row spBlock m0l m30r w-auto h-100">
                        <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                            <label class="m0 text-white fs16">Độ tuổi</label>
                        </div>
                        <div class="centered p0 bg-white">
                            <select name="table_type" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 140px">
                                @foreach(TYPE_POPULATION_NAME as $key => $value)
                                    <option value="{{ $key }}" @if(isset($params['table_type']) && $params['table_type'] == $key) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row m0" style="justify-content: flex-end">
                        <div class="text-right">
                            <a href="/create" class="btn custom-btn-success">
                                Xuất file
                            </a>
                        </div>
                        <div class="text-right m10l">
                            <a href="{{ route(USER_STATISTICAL_CREATE) }}" class="btn custom-btn-success">
                                Thêm bản ghi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="content-wrapper" style="background-color: white;">
                        <table class="table table-bordered table-striped border-0 m0">
                            <thead>
                            <tr>
                                <th class="text-center">Cân nặng (kg)</th>
                                <th class="text-center">Chiều cao (cm)</th>
                                <th class="text-center">....</th>
                                <th class="text-center">....</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $item['weight'] }}</td>
                                <td>{{ $item['height'] }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-danger text-center">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                           </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/nutrition.js')}}"></script>
@endsection
