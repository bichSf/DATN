@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="text-center m70t">Quên mật khẩu</h1>
        <div class="forgot-pw-step1">
            <form id="email-reset">
                @csrf
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t">Email <span class="text-red">*</span></label>
                </div>
                <div class="row m0 m10t">
                    <input type="email" class="offset-4 col-5 form-control input-reset fs14-sp" name="email"
                           id="email-forgot" placeholder="Email">
                    <p class="offset-4 col-5 p0l error-message" data-error="email"></p>
                </div>
            </form>
            <div class="text-center">
                <button class="btn border-0 btn-primary p10t p10b m30t m30b btn-register-social" id="submit-gmail-forgot-pass">
                    Lấy lại mật khẩu
                </button>
            </div>
        </div>

        <div class="forgot-pw-step2" style="display: none">
            <div class="row m0 m10t">
                <label class="offset-4 fs12-sp m5t">Email <span class="text-red">*</span></label>
            </div>
            <div class="row m0 m10t">
                <input type="email" class="offset-4 col-5 form-control input-reset fs14-sp" name="email"
                       id="email-forgot" placeholder="Email">
                <p class="offset-4 col-5 p0l error-message" data-error="email"></p>
            </div>

            <div class="form-process col-sm-12 col-lg-8">
                <div class="row process-content active text-center">
                    <div class="content-auth-email w-95-sp">
                        <span class="fs16-sp">Mail đã được gửi</span>
                        <br>
                        <span class="fs16-sp">Có 1 mail đã được gửi đến email bên dưới</span>
                    </div>
                    <div class="form-group div-block w-95-sp pd-5-sp">
                        <div class="fs16-sp email-forgot-pass">tranbichbk@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="receive-email head-process m70t">
            <hr>
            <div class="title-receive-email">Nếu bạn không nhận được email</div>
            <div class="message-receive-email text-justify ">
                <span class="fs13-sp">* Nếu bạn sử dụng địa chỉ email miễn phí, nó có thể được sắp xếp vào thư mục thư rác hoặc thùng rác.</span>
                <br>
                <span class="fs13-sp">* Vui lòng kiểm tra.</span>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{ asset('js/custom/forgot_password.js') }}"></script>
@endsection