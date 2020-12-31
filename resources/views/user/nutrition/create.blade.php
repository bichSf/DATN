@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thêm dữ liệu</h1>
    </div>
    <div class="display-highcharts m30t">
        <form id="form-create-data" action="">
            <div class="row m0">
                <div class="col-12 bg-white" style="padding: 30px;">
                    <div class="content-wrapper" style="background-color: white;">
                        <div class="row m0">
                            <div class="col-5 p0 p20r">
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Độ tuổi<span class="text-danger">*</span></span></div>
                                    <div class="col-8">
                                        <select class="form-control" name="table_type">
                                            @foreach(TYPE_POPULATION_NAME as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Cân nặng<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="weight" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="weight"></p>
                                        </div>
                                        <div class="d-flex align-items-center">KG</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Chiều cao<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="height" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="height"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Vòng cánh tay<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="arm_circumference" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="arm_circumference"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Vòng đầu<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="head_circumference" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="head_circumference"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Vòng ngực<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="chest_circumference" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="chest_circumference"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Nếp gấp da ở cơ tam đầu<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="biceps_skinfold" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="biceps_skinfold"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Phần trăm mỡ của cơ thể<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="fat_percentage" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="fat_percentage"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Chiều cao đầu gối<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="knee_height" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="knee_height"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Vòng bụng chân<span class="text-danger">*</span></span></div>
                                    <div class="row col-8 m0 p0">
                                        <div class="col-10">
                                            <input type="text" class="form-control text-right convert-data" name="stomach_feet" placeholder="0.00">
                                            <p class="error-message p5t m0" data-error="stomach_feet"></p>
                                        </div>
                                        <div class="d-flex align-items-center">CM</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7 p-0 p40l">
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Đợt khảo sát <span class="text-danger">*</span></span></div>
                                    <div class="col-8">
                                        <select class="form-control" name="survey_id">
                                            <option value="">Chọn đợt khảo sát</option>
                                            @foreach($listSurvey as $survey)
                                                <option value="{{ $survey['id'] }}">{{ $survey['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <p class="error-message p5t m0" data-error="survey_id"></p>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Năm thống kê</span></div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="year" disabled>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Tháng thống kê</span></div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="month" disabled>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Khu vực thống kê</span></div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="area" disabled>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Tỉnh / Thành Phố</span></div>
                                    <div class="col-8">
                                        <select class="form-control" name="provincial" id="">
                                            <option value="">Tỉnh/ Thành phố</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m10b">
                                    <div class="col-4 d-flex align-items-center"><span>Quận / Huyện</span></div>
                                    <div class="col-8">
                                        <select class="form-control" name="district" id="">
                                            <option value="">Quận/ Huyện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m0 p30t" style="justify-content: flex-end">
                <div class="text-right">
                    <button id="btn-create-data" type="button" class="btn custom-btn-primary">
                        Lưu
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="display-highcharts m30t">
        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="content-wrapper" style="background-color: white;">
                    <div class="row m0 m30b">
                        <div class="col-3 p0">
                            <form id="form-down-csv" action="{{ route(DOWN_CSV) }}" method="GET">
                            <select id="csv-table-type" name="table_type" id="" class="form-control" style="width: 200px;">
                                @foreach(TYPE_POPULATION_NAME as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            </form>
                        </div>
                        <form id="form-csv" action="{{ route(SAVE_DATA_CSV) }}" class="col-9 p0 display-flex justify-content-end" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input id="show-file-name" type="text" class="form-control" style="width: 500px;" placeholder="example.csv" readonly>
                            <button id="choose-file" type="button" class="btn custom-btn-success m20l">Chọn file</button>
                            <button id="down-csv" type="button" class="btn custom-btn-success m20l">Tải file mẫu</button>
                            <input id="input-csv" name="data_csv" type="file" class="d-none">
                            <input id="input-table-type" name="table_type" type="hidden" class="d-none" value="infants_0_0">
                        </form>
                    </div>
                    <div id="table-show-csv">
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
        <div class="row m0 p30t" style="justify-content: flex-end">
            <div class="text-right">
                <button type="button" id="post-data-csv" class="btn custom-btn-primary">
                    Lưu
                </button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/address.js')}}"></script>
    <script src="{{ asset('js/custom/statistic_nutrition.js')}}"></script>
@endsection
