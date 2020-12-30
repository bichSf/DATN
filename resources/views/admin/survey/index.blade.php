@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Quản lý đợt khảo sát</h1>
    </div>
    <div class="display-highcharts m30t">
        <form id="form-statistical-population" action="{{ route(ADMIN_MANAGER_SURVEY) }}" method="GET">
            <div class="row m0 m30b">
                <div id="block-status" class="row spBlock m0l w-auto h-100">
                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 100px;">
                        <label class="m0 text-white fs16">Khu vực</label>
                    </div>
                    <div class="centered p0 bg-white m30r">
                        <select name="area_id" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 80px">
                            <option value="" selected>Chọn khu vực khảo sát</option>
                            @foreach(AREAS as $key => $value)
                                <option value="{{ $key }}" @if(isset($params['area_id']) && $params['area_id'] == $key) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 50px;">
                        <label class="m0 text-white fs16">Tháng </label>
                    </div>
                    <div class="centered p0 bg-white m30r">
                        <select name="month" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 80px">
                            <option value="" selected>Chọn tháng khảo sát</option>
                            @for($month=1; $month<=12; $month++)
                                <option value="{{ $month }}" @if(isset($params['month']) && $params['month'] == $month) selected @endif>{{ $month }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 50px;">
                        <label class="m0 text-white fs16">Năm </label>
                    </div>
                    <div class="centered p0 bg-white">
                        <select name="year" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 80px">
                            <option value="" selected>Chọn năm khảo sát</option>
                            @foreach(dateYear() as $key => $year)
                                <option value="{{ $year }}" @if(isset($params['year']) && $params['year'] == $year) selected @endif>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row m0 m30b">
                <div class="col-6 offset-6 p-0">
                    <div class="row m0" style="justify-content: flex-end">
                        <div class="text-right m10l">
                            <a href="{{ route(ADMIN_SURVEY_CREATE) }}" class="btn custom-btn-success">
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
                            <th class="text-center">Tên khảo sát</th>
                            <th class="text-center">Khu vực</th>
                            <th class="text-center">Tháng / Năm</th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listSurvey as $item)
                            <tr>
                                <td class="w-25">{{ $item->name }}</td>
                                <td class="w-25">{{ AREAS[$item->area_id] }}</td>
                                <td class="w-30 text-center">{{ $item->month }} / {{ $item->year }}</td>
                                <td>
                                    <button class="btn btn-success border-0 btn-topic-custom btn-accept-topic-student mr-4" @if($item->done == 1) disabled @endif>
                                        <a href="{{ route(ADMIN_SURVEY_EDIT, $item['id']) }}" class="text-white @if($item->done == 1) a-disabled @endif"
                                           data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                    </button>
                                    <button id="delete-survey" @if($item->done == 0) data-toggle="modal" data-target="#modal-delete" @endif class="btn btn-danger border-0 btn-topic-custom"
                                            @if($item->done == 1) disabled @endif data-id="{{ $item->id }}">
                                        <a class="text-white @if($item->done == 1) a-disabled @endif" data-toggle="tooltip" data-placement="top" title="Xoá">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-danger border-0 text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="group-end d-flex mt-3 justify-content-between">
            @if($listSurvey->total() > 0)
                <span>{{ $listSurvey->firstItem() }} ~ {{ $listSurvey->lastItem() }} / {{ $listSurvey->total() }} bản ghi</span>
            @endif
            {{ $listSurvey->appends([
                'area_id' => $params['area_id'] ?? '',
                'month' => $params['month'] ?? '',
                'year' => $params['year'] ?? ''])->links('partials.paginate', ['paginator' => $listSurvey]) }}
        </div>

        <div class="modal" id="modal-delete">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form id="form-delete-survey" method="POST" class="form-data-submit w-100">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <input id="input-type-delete" type="hidden" name="type">
                            <input type="hidden" id="input-id-delete">
                            <h5 class="modal-title text-white">Xoá item</h5>
                        </div>
                        <div class="modal-body centered">
                            <p>Bạn muốn xoá đợt khảo sát này?</p>
                        </div>
                        <div class="modal-footer centered">
                            <button type="submit" class="btn btn-danger text-white w-25 mr-4" >Ok</button>
                            <button type="button" class="btn button-cancel-modal btn-success w-25" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/custom/survey.js') }}"></script>
@endsection
