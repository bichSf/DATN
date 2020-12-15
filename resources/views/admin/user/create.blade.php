@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thêm nhân viên khảo sát</h1>
    </div>

    <div class="display-highcharts m30t">
        <div class="row m0 bg-white" style="padding: 30px 15px;">
            <div class="col-6">
                <table class="table table-bordered">
                    <tr>
                        <td class="label-info">
                            <span>Avatar</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div id="image-avatar" class="avatar essential-icon-img pointer" style="width: 40%;">
                                    <img src="{{ asset('images/icon-img.png') }}">
                                </div>
                                <div class="p5" style="width: 60%">
                                    <p class="fs13 fw-bold m5b">Chọn tệp để tải lên</p>
                                    <p class="m5b">Bạn có thể tải lên hình ảnh bằng cách kéo và thả</p>
                                </div>
                                <p class="error-messages" data-error="avatar"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Họ tên</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <label class="col-2 col-md-1 text-left lh3 p0">Họ</label>
                                <div class="col-9 col-md-4 p0l">
                                    <input type="text" name="person_charge_last_name" class="form-control fs13 progress-calculate" value=""
                                           placeholder="Họ">
                                    <p class="error-message p5t m0" data-error="person_charge_last_name"></p>
                                </div>
                                <label class="col-2 col-md-1 text-left text-md-center p0 lh3">Tên</label>
                                <div class="col-9 col-md-4 p0r p0l-under-md input-md-pr">
                                    <input type="text" name="person_charge_first_name" class="form-control fs13 progress-calculate" value=""
                                           placeholder="Tên">
                                    <p class="error-message p5t m0" data-error="person_charge_first_name"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Giới tính / Ngày sinh</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-6">
                                    <select name="gender" class="form-control m5b fs13 progress-calculate">
                                        <option value="0" selected>Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                    <p class="error-message" data-error="gender"></p>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="birthday" id="date-picker" class="form-control fs13 progress-calculate" value="">
                                    <p class="error-message p5t m0" data-error="birthday"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Email</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="email" value="" class="form-control fs13 progress-calculate">
                                </div>
                                <p class="error-message p5t m0" data-error="email"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>SĐT</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="phone" class="form-control fs13 progress-calculate"
                                           value="" placeholder="SDT">
                                </div>
                                <p class="error-message p5t m0" data-error="phone"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Địa chỉ</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="phone" class="form-control fs13 progress-calculate"
                                           value="" placeholder="">
                                </div>
                                <p class="error-message p5t m0" data-error="phone"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Thông tin khác</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <textarea name="memo_broker" class="form-control essential-input-border text-left fs14" rows="5" placeholder=""></textarea>
                                </div>
                                <p class="error-message p5t m0" data-error="phone"></p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-bordered">
                    <tr>
                        <td class="label-info">
                            <span>Bộ phận</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <select  class="form-control fs13 progress-calculate" name="" id="">
                                        <option value="">Value 1</option>
                                        <option value="">Value 1</option>
                                        <option value="">Value 1</option>
                                        <option value="">Value 1</option>
                                    </select>
                                </div>
                                <p class="error-message p5t m0" data-error="phone"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Chức vụ</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <select  class="form-control fs13 progress-calculate" name="" id="">
                                        <option value="">Value 1</option>
                                        <option value="">Value 1</option>
                                        <option value="">Value 1</option>
                                        <option value="">Value 1</option>
                                    </select>
                                </div>
                                <p class="error-message p5t m0" data-error="phone"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Chi nhánh</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="phone" class="form-control fs13 progress-calculate"
                                           value="" placeholder="">
                                </div>
                                <p class="error-message p5t m0" data-error="phone"></p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="m30t">
            <div class="row m0">
                <div class="col-12 p0r text-right">
                    <button type="button" class="btn custom-btn-success fs15 btn-submit-summary btn-essential-submit" style="min-width: 100px">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/profile.js') }}"></script>
@endsection
