@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Thay đổi mật khẩu</h1>
    </div>

    <div class="display-highcharts m30t">
        <div class="row m0 bg-white" style="padding: 30px 15px;">
            <div class="col-12">
            <form id="form-change-password" class="p60b" style="border: 1px solid #dee2e6;">
                @csrf
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="password_old">Mật khẩu cũ
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="old_password"
                           id="old-password" placeholder="Mật khẩu cũ">
                    <p class="offset-4 col-5 p0l error-message" data-error="old_password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="password">Mật khẩu mới
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="password"
                           id="password" placeholder="Mật khẩu mới">
                    <p class="offset-4 col-5 p0l error-message" data-error="password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="password-confirm">Mật khẩu xác nhận
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="password_confirm"
                           id="password-confirm" placeholder="Mật khẩu xác nhận">
                    <p class="offset-4 col-5 p0l error-message" data-error="password_confirm"></p>
                </div>
            </form>
            </div>
        </div>
        <div class="m30t">
            <div class="row m0">
                <div class="col-12 p0r text-right">
                    <button type="submit" id="btn-change-password" class="btn custom-btn-success" style="min-width: 100px">Thay đổi mật khẩu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/custom/change_password.js')}}"></script>
@endsection
