@extends('layouts.base')
@section('content')
    <div class="container-fluid container-wrapper p0 p30t bg-white">
        <div class="container container-info">
            <form action="" id="form-data-profile">
                <div class="head">
                    <h1 class="text-center fw-bold">Thông tin cá nhân</h1>
                </div>
                @include('partials.flash_messages')
                <table class="table table-bordered">
                    <tr>
                        <td class="label-info">
                            <span>Avatar</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-12 col-md-3 p0l m5b">
                                    <div id="image-avatar" class="avatar essential-icon-img pointer">
                                        <img src="{{ asset('images/icon-img.png') }}">
                                    </div>
                                </div>
                                <div class="col-md-9 p0l">
                                    <p class="fs16 fw-bold m5b">Chọn tệp để tải lên</p>
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
                            <span>Giới tính</span>
                            <label class="label-required float-md-right">Bắt buộc</label>
                        </td>
                        <td>
                            <div class="row p20l">
                                <select name="gender" class="form-control col-10 col-md-2 m5b fs13 progress-calculate">
                                    <option value="0" selected>Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                                <p class="error-message" data-error="gender"></p>
                                <span class="col-10 col-md-1 d-none d-md-block text-center fs20">/</span>

                                <div class="col-10 col-md-3 p0l p0r">
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
                            <span>SDT</span>
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
                </table>
                <input id="input-avatar" type="file" name="avatar" class="d-none progress-calculate-avatar">

                <div class="row p15r p15l">
                    <div class="col-12 text-center">
                        <button type="button" id="import-info" class="btn border-0 custom-top-btn-primary import-info">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/profile.js') }}"></script>
@endsection