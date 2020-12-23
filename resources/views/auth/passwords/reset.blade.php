@extends('layouts.base')
@section('styles')
@endsection
@section('content')
    <div class="container-fluid container-wrapper p0 p30t bg-white">
        <div class="container container-info">
            <div class="head">
                <h1 class="text-center fw-bold">Thay đổi mật khẩu</h1>
            </div>
            <form id="form-change-password">
                @csrf
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="password_old">Old password
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="old_password"
                           id="old-password" placeholder="Old password">
                    <p class="offset-4 col-5 p0l error-message" data-error="old_password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="password">Password
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="password"
                           id="password" placeholder="Password">
                    <p class="offset-4 col-5 p0l error-message" data-error="password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="password-confirm">Password confirm
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="password_confirm"
                           id="password-confirm" placeholder="Password confirm">
                    <p class="offset-4 col-5 p0l error-message" data-error="password_confirm"></p>
                </div>
            </form>

            <div class="row p15r p15l">
                <div class="col-12 text-right">
                    <button type="submit" id="btn-change-password" class="btn custom-btn-success">
                        Thay đổi mật khẩu
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/custom/change_password.js')}}"></script>
@endsection
