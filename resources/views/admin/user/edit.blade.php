@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Chỉnh sửa nhân viên khảo sát</h1>
    </div>

    <div class="display-highcharts m30t">
        <div class="row m0 bg-white" style="padding: 30px 15px;">
            <div class="col-12">
                <form id="form-update-user" action="">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <table class="table table-bordered">
                    <tr>
                        <td class="label-info">
                            <span>Avatar</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <img id="image-avatar" class="avatar essential-icon-img pointer" @if($user->avatar) src="{{asset( PATH_AVATAR_USER . $user->avatar ) }}" @endif style="object-fit: contain">
                                <div class="centered-vertical p20l" style="width: 60%">
                                    <p class="fs-16 fw-bold m5b">Chọn tệp để tải lên</p>
                                </div>
                                <input name="avatar" type="file" accept="image/x-png,image/gif,image/jpeg" style="display: none">
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
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control fs13" placeholder="Họ tên">
                                    <p class="error-message p5t m0" data-error="name"></p>
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
                                <div class="col-10 col-md-8 p0l p0r">
                                    <select name="gender" class="form-control m5b fs13">
                                        <option value="">Chọn giới tính</option>
                                        <option value="0" @if($user->gender == 0) selected @endif>Nam</option>
                                        <option value="1" @if($user->gender == 1) selected @endif>Nữ</option>
                                    </select>
                                    <p class="error-message" data-error="gender"></p>
                                </div>

                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="birthday" id="date-picker" class="date-time form-control fs13 bg-white" readonly value="{{ $user->birthday ? date('d/m/Y', strtotime($user->birthday)) : '' }}" placeholder="01/01/1970">
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
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control fs13"  placeholder="abc@gmail.com">
                                    <p class="error-message p5t m0" data-error="email"></p>
                                </div>
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
                                    <input type="text" name="phone" class="form-control fs13" value="{{ $user->phone }}" placeholder="01683024581">
                                    <p class="error-message p5t m0" data-error="phone"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Mật khẩu</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="password" name="password" value="" class="form-control fs13">
                                    <p class="error-message p5t m0" data-error="password"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Xác nhận mật khẩu</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="password" name="password_confirm" value="" class="form-control fs13">
                                    <p class="error-message p5t m0" data-error="password_confirm"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Bộ phận</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="department" class="form-control fs13" value="{{ $user->department }}">
                                    <p class="error-message p5t m0" data-error="department"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Chức vụ</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="part" class="form-control fs13" value="{{ $user->part }}">
                                </div>
                                <p class="error-message p5t m0" data-error="part"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Chi nhánh</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="branch" class="form-control fs13" value="{{ $user->branch }}">
                                </div>
                                <p class="error-message p5t m0" data-error="branch"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-info">
                            <span>Địa chỉ</span>
                        </td>
                        <td>
                            <div class="row p20l">
                                <div class="col-10 col-md-8 p0l p0r">
                                    <input type="text" name="address" class="form-control fs13" value="{{ $user->address }}">
                                    <p class="error-message p5t m0" data-error="address"></p>
                                </div>
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
                                    <textarea name="note" class="form-control" rows="5">{{ $user->note }}</textarea>
                                    <p class="error-message p5t m0" data-error="note"></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        <div class="m30t">
            <div class="row m0">
                <div class="col-12 p0r text-right">
                    <button type="button" class="btn custom-btn-success fs15 btn-submit-summary btn-profile-update" style="min-width: 100px">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/profile.js') }}"></script>
@endsection
