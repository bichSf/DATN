@extends('layouts.base_simulation')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thêm dữ liệu</h1>
    </div>

    <div class="row m0 m30t m30b">
        <form class="col-8 col-lg-8 p0">
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
                                <div class="col-4 d-flex align-items-center"><span>Cân nặng</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="weight" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">KG</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Chiều cao</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="height" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng cánh tay</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="arm_circumference" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng đầu</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="head_circumference" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng ngực</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="chest_circumference" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Nếp gấp da ở cơ tam đầu</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="biceps_skinfold" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Phần trăm mỡ của cơ thể</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="fat_percentage" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Chiều cao đầu gối</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="knee_height" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng bụng chân</span></div>
                                <div class="row col-8 m0 p0">
                                    <div class="col-10"><input type="text" class="form-control text-right" name="stomach_feet" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Năm thống kê</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="year">
                                        @for($year = date('Y'); $year > 1999; $year--)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Khu vực</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="provincial" id="">
                                        @foreach(AREAS as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-primary">ok</button>
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
                        <div id="id-chart-3"></div>
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
                                <div class="col-6">Chỉ số Z-score: </div>
                                <div class="col-6">-2.5</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-6">Thể trạng:</div>
                                <div class="col-6">Suy dinh dưỡng cấp I</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-6">Tỷ lệ :</div>
                                <div class="col-6">12%</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-6">Cân nặng nên có :</div>
                                <div class="col-6">25 kg</div>
                            </div>
                            <div class="row m0  m15t">
                                <div class="col-6">Chỉ số BMI :</div>
                                <div class="col-6">17.5</div>
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
                        <div id="id-chart-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/simulation.js')}}"></script>
    <script src="{{ asset('js/custom/address.js')}}"></script>
    <script src="{{ asset('js/custom/population.js')}}"></script>
@endsection
