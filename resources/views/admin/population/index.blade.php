@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Khảo sát dinh dưỡng</h1>
    </div>
    <div class="display-highcharts m30t">
        @include('partials/flash_messages')
        <div class="row m0 m30b">
            <div class="col-6">
                <div id="block-status" class="row spBlock m0l m30r w-auto h-100">
                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                        <label class="m0 text-white fs16">Độ tuổi</label>
                    </div>
                    <div class="centered p0 bg-white">
                        <select name="year" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 140px">
                            <option value="1962" selected="">5 - 11 tuổi</option>
                            <option value="1962" selected="">5 - 11 tuổi</option>
                            <option value="1962" selected="">5 - 11 tuổi</option>
                            <option value="1962" selected="">5 - 11 tuổi</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row m0" style="justify-content: flex-end">
                    <div class="text-right">
                        <a href="/create" class="btn btn-success">
                            Xuất file
                        </a>
                    </div>
                    <div class="text-right m10l">
                        <a href="/create" class="btn btn-success">
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
                                <td>....</td>
                                <td>....</td>
                                <td>....</td>
                                <td>....</td>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
