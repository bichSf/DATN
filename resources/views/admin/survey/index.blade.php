@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Quản lý đợt khảo sát</h1>
    </div>
    <div class="display-highcharts m30t">
        <div class="row m0 m30b">
            <div class="col-6 offset-6">
                <div class="row m0" style="justify-content: flex-end">
                    <div class="text-right m10l">
                        <a href="{{ route(ADMIN_SURVEY_CREATE) }}" class="btn btn-success">
                            Thêm bản ghi
                        </a>
                    </div>
                </div>
            </div>
        </div>

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
                                        <a href="{{ route(ADMIN_SURVEY_EDIT, $item['id']) }}" class="text-white btn btn-success border-0 btn-topic-custom btn-accept-topic-student mr-4" data-id="{{ $item['id'] }}" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i class="fa fa-edit"></i></a>
                                        <a class="text-white btn btn-danger border-0 btn-topic-custom btn-remove-topic-student" data-id="{{ $item['id'] }}" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-danger border-0">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
