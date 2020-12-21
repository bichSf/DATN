@extends('layouts.base')
@section('styles')
@endsection
@section('content')
    <div class="container-fluid container-wrapper p0 p30t bg-white">
        <div class="container container-info">
            <div class="head">
                <h1 class="text-center fw-bold">Thay đổi mật khẩu</h1>
            </div>
            <form id="email-reset">
                @csrf
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-reset">Old password
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="old-password"
                           id="password-reset" placeholder="Old password">
                    <p class="offset-4 col-5 p0l error-message" data-error="old-password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-reset">Password
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="password"
                           id="password-reset" placeholder="Password">
                    <p class="offset-4 col-5 p0l error-message" data-error="password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-reset">Password confirm
                        <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-reset fs14-sp" name="password_confirm"
                           id="password-reset" placeholder="Password confirm">
                    <p class="offset-4 col-5 p0l error-message" data-error="password_confirm"></p>
                </div>
            </form>

            <div class="row p15r p15l">
                <div class="col-12 text-center">
                    <button type="button" id="import-info" class="btn border-0 custom-top-btn-primary import-info">
                        Thay đổi mật khẩu
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
