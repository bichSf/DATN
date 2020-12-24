@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Quản lý nhân sự</h1>
    </div>
    <div class="display-highcharts m30t">
        <div class="row m0 m30b">
            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="row m0" style="justify-content: flex-end">
                    <div class="text-right m10l">
                        <a href="{{ route(ADMIN_USER_CREATE) }}" class="btn btn-success">
                            Thêm bản ghi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="content-wrapper"
                     style="background-color: white; background-color: white; overflow: auto; max-height: 1000px;">
                    <table class="table table-bordered table-striped border-0 m0">
                        <thead>
                        <tr>
                            <td class="w-4">STT</td>
                            <td>Ảnh</td>
                            <td>Email</td>
                            <td>Họ tên</td>
                            <td>SDT</td>
                            <td>Giới tính</td>
                            <td>Ngày sinh</td>
                            <td>Bộ phận</td>
                            <td>Chức vụ</td>
                            <td>Chi nhánh</td>
                            <td>Địa chỉ</td>
                            <td>Ngày tạo</td>
                            <td></td>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listUser as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <div>
                                        <img
                                            src="{{ empty($value['avatar']) ? asset('images/user_default.png') : asset( PATH_AVATAR_USER . $value['avatar'] ) }}"
                                            style="object-fit: cover; width: 40px; height: 40px">
                                    </div>
                                </td>
                                <td>{{ $value['email'] }}</td>
                                <td>{{ $value['name'] }}</td>
                                <td>{{ $value['phone'] }}</td>
                                <td>{{ GENDER_NAME[$value['gender']] }}</td>
                                <td>{{ date('d/m/Y', strtotime($value['birthday'])) }}</td>
                                <td>{{ $value['department'] }}</td>
                                <td>{{ $value['part'] }}</td>
                                <td>{{ $value['branch'] }}</td>
                                <td>{{ $value['address'] }}</td>
                                <td>{{ date('d/m/Y', strtotime($value['created_at'])) }}</td>
                                <td>
                                    <a href="{{ route(ADMIN_USER_EDIT, $value['id']) }}"
                                       class="btn btn-success border-0 btn-topic-custom btn-accept-topic-student mb-4 text-white"
                                       data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i
                                            class="fa fa-edit"></i></a>
                                    <button id="delete-user" class="btn btn-danger border-0 btn-topic-custom" data-toggle="modal" data-target="#modal-delete" data-id="{{ $value['id'] }}">
                                        <a class="text-white" data-toggle="tooltip" data-placement="top" title="Xoá">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center"> Không có dữ liệu</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal" id="modal-delete">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form id="form-delete-user" method="POST" class="form-data-submit w-100">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <input id="input-type-delete" type="hidden" name="type">
                            <input type="hidden" id="input-id-delete">
                            <h5 class="modal-title text-white">Xoá item</h5>
                        </div>
                        <div class="modal-body centered">
                            <p>Bạn muốn xoá nhân viên này?</p>
                        </div>
                        <div class="modal-footer centered">
                            <button type="submit" class="btn btn-danger text-white w-25 mr-4" >Ok</button>
                            <button type="button" class="btn button-cancel-modal btn-success w-25" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/custom/profile.js') }}"></script>
@endsection
