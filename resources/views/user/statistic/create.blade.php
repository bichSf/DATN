@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thêm dữ liệu</h1>
    </div>
    <div class="display-highcharts m30t">
        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="content-wrapper" style="background-color: white;">
                    <div class="row m0 m30b">
                        <select name="" id="" class="form-control" style="width: 200px;">
                            @foreach(TYPE_POPULATION_NAME as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control m20l" style="width: 500px;" placeholder="example.csv">
                        <button class="btn btn-success m20l">Chọn file</button>
                    </div>
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
        <div class="row m0 p30t" style="justify-content: flex-end">
            <div class="text-right">
                <a href="" class="btn btn-primary">
                    Lưu
                </a>
            </div>
        </div>
    <div class="display-highcharts m30t">
        @include('partials/flash_messages')
        <form action="">
            <div class="row m0">
                <div class="col-12 bg-white" style="padding: 30px;">
                    <div class="content-wrapper" style="background-color: white;">
                        <div class="row m0">
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
                    <a href="" class="btn btn-primary">
                        Lưu
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/address.js')}}"></script>
    <script src="{{ asset('js/custom/population.js')}}"></script>
@endsection
