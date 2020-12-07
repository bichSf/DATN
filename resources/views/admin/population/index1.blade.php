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
                            <option value="">Từ 5 - 11 tuổi</option>
                            <option value="">Từ 5 - 11 tuổi</option>
                            <option value="">Từ 5 - 11 tuổi</option>
                            <option value="">Từ 5 - 11 tuổi</option>
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
        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="content-wrapper" style="background-color: white;">
                    <div class="row m0">
                        <div class="col-4">
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Độ tuổi</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="" id="">
                                        <option value="">5 - 11 tuổi</option>
                                        <option value="">5 - 11 tuổi</option>
                                        <option value="">5 - 11 tuổi</option>
                                        <option value="">5 - 11 tuổi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Chiều cao</span></div>
                                <div class="row col-8">
                                    <div class="col-11"><input type="text" class="form-control text-right" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Cân nặng</span></div>
                                <div class="row col-8">
                                    <div class="col-11"><input type="text" class="form-control text-right" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">KG</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng cánh tay</span></div>
                                <div class="row col-8">
                                    <div class="col-11"><input type="text" class="form-control text-right" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng đầu</span></div>
                                <div class="row col-8">
                                    <div class="col-11"><input type="text" class="form-control text-right" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Vòng ngực</span></div>
                                <div class="row col-8">
                                    <div class="col-11"><input type="text" class="form-control text-right" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Nếp gấp da ở cơ tam đầu</span></div>
                                <div class="row col-8">
                                    <div class="col-11"><input type="text" class="form-control text-right" placeholder="0.00"></div>
                                    <div class="d-flex align-items-center">CM</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Năm thống kê</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="" id="">
                                        <option value="">2000</option>
                                        <option value="">2001</option>
                                        <option value="">2002</option>
                                        <option value="">2003</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Tỉnh / Thành Phố</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="" id="">
                                        <option value="">Hà Nội</option>
                                        <option value="">Hà Nội</option>
                                        <option value="">Hà Nội</option>
                                        <option value="">Hà Nội</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m10b">
                                <div class="col-4 d-flex align-items-center"><span>Quận / Huyện</span></div>
                                <div class="col-8">
                                    <select class="form-control" name="" id="">
                                        <option value="">Cầu Giấy</option>
                                        <option value="">Cầu Giấy</option>
                                        <option value="">Cầu Giấy</option>
                                        <option value="">Cầu Giấy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div id="id-chart-3"></div>
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
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/demo1.js')}}"></script>
@endsection
