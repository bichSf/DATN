@extends('layouts.base_simulation')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thêm dữ liệu</h1>
    </div>

    <div class="row m0 m30t m30b">
        <form id="form-data" class="col-8 col-lg-8 p0">
            <input type="hidden" name="simulation" value="simulation">
            <div class="item-block-property m15r h-100">
                <div class="m0 diagram-analysisu h-100">
                    <div class="row m0 col-12 p30 m25b diagram-block bg-white h-100">
                        <div class="col-6">
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Độ tuổi</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="table_type">
                                        @foreach(TYPE_POPULATION_NAME as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Giới tính</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="gender">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Cân nặng</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="weight" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="weight"></p>
                                    </div>
                                    <div class="d-flex align-items-center">KG</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Chiều cao</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="height" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="height"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng cánh tay</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="arm_circumference" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="arm_circumference"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng đầu</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="head_circumference" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="head_circumference"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng ngực</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="chest_circumference" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="chest_circumference"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Nếp gấp da ở cơ tam đầu</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="biceps_skinfold" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="biceps_skinfold"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Phần trăm mỡ của cơ thể</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="fat_percentage" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="fat_percentage"></p>
                                    </div>
                                    <div class="d-flex align-items-center">%</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Chiều cao đầu gối</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="knee_height" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="knee_height"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng bụng chân</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10">
                                        <input type="text" class="form-control text-right convert-data" name="stomach_feet" placeholder="0.00">
                                        <p class="error-message p5t m0" data-error="stomach_feet"></p>
                                    </div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Năm thống kê</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="year">
                                        @foreach(getRangeYearSurvey() as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Khu vực</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="area" id="">
                                        @foreach(AREAS as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <div>
                                <button id="btn-see-results" type="button" class="btn btn-primary">Xem kết quả</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-4 col-lg-4 p0">
            <div class="item-block-property m15l h-100">
                <div class="m0 diagram-analysisu h-100">
                    <div class="col-12 p30 m25b diagram-block bg-white h-100">
                        <div id="id-spider-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row m0">
        <div class="col-4 col-lg-4 p0">
            <div class="item-block-property m15r h-100">
                <div class="m0 m30b diagram-analysisu h-100">
                    <div class="col-12 p30 m25b diagram-block bg-white h-100">
                        <div>
                            <div class=" font-weight-bold text-center">Tình trạng hiện tại</div>
                            <div class="row m0  m15t">
                                <div class="col-4">Chỉ số Z-score: </div>
                                <div id="z-score" class="col-4">-2.5</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-4">Chỉ số BMI:</div>
                                <div id="bmi" class="col-6">17.5</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-4">Thể trạng:</div>
                                <div id="z-bmi-status" class="col-6">Gầy độ I</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-4">Cân nặng nên có:</div>
                                <div id="weight-ideal" class="col-6">25 kg</div>
                            </div>
                        </div>
{{--                        <div id="id-chart"></div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 col-lg-8 p0">
            <div class="item-block-property m15l h-100">
                <div class="m0 m30b diagram-analysisu h-100">
                    <div class="col-12 p30 m25b diagram-block bg-white h-100">
                        <div id="id-multiples-column-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/simulation.js')}}"></script>
@endsection
