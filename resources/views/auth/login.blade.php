<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/login.css') }}">

    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}></script>
</head>
<body>
<div class="login">
    <h3 class="title-project">Khảo sát dinh dưỡng</h3>
    <div id="block-login">
        <h3 class="title-form-login">Đăng nhập</h3>
        @include('partials.flash_messages')
        <form class="form-login text-center" method="post" {{ route(LOGIN) }}>
            @csrf
            <div class="form-group">
                <input type="text" name="email" value="@if(old('email')) {{ old('email') }} @endif" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <p class="text-error-login text-left" role="alert">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                @if ($errors->has('password'))
                    <p class="text-error-login text-left" role="alert">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label class='container-input'>
                    Lưu phiên đăng nhập
                    <input type='checkbox' name="remember" @if(old('remember')) checked @endif/>
                    <span class="checkmark"></span>
                </label>
            </div>
            <button type="submit" class="btn button-login">Đăng nhập</button>
        </form>
    </div>
</div>
</body>
</html>
