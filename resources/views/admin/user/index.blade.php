@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Quản lý nhân sự</h1>
    </div>
    <div class="display-highcharts m30t">
        <form id="form-statistical-population" action="{{ route(ADMIN_MANAGER_USER) }}" method="GET">
            <div class="row m0 m30b">
                <div id="block-status" class="row spBlock m0l w-auto h-100">
                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 100px;">
                        <label class="m0 text-white fs16">Email</label>
                    </div>
                    <div class="centered p0 bg-white m30r">
                        <input name="email" type="text" placeholder="abc@gmail.com" class="form-control rounded-0" value="{{ isset($params['email']) ? $params['email'] :'' }}">
                    </div>

                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 100px;">
                        <label class="m0 text-white fs16">Họ tên</label>
                    </div>
                    <div class="centered p0 bg-white m30r">
                        <input name="name" type="text" placeholder="tran bich" class="form-control rounded-0" value="{{ isset($params['name']) ? $params['name'] : '' }}">
                    </div>

                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 80px;">
                        <label class="m0 text-white fs16">SDT</label>
                    </div>
                    <div class="centered p0 bg-white m20r">
                        <input name="phone" type="text" placeholder="01683024581" class="form-control rounded-0" value="{{ isset($params['phone']) ? $params['phone'] : '' }}">
                    </div>

                    <div class="centered-vertical">
                        <button type="submit" class="btn btn-search no-border custom-btn-primary h-100 btn-group-item border-0 fw500">
                            <i aria-hidden="true" class="fas fa-search fa-lg text-white btn-action"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row m0 m30b">
                <div class="col-6 offset-6 p-0">
                    <div class="row m0" style="justify-content: flex-end">
                        <div class="text-right m10l">
                            <a href="{{ route(ADMIN_USER_CREATE) }}" class="btn custom-btn-success">
                                Thêm bản ghi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="content-wrapper"
                     style="background-color: white; background-color: white; overflow-x: auto;">
                    <table class="table table-bordered table-striped border-0 m0">
                        <thead>
                        <tr>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">SDT</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Bộ phận</th>
                            <th class="text-center">Chức vụ</th>
                            <th class="text-center">Chi nhánh</th>
                            <th class="text-center">Địa chỉ</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listUser as $key => $value)
                            <tr>
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
                                <td>{{ $value['birthday'] ? date('d/m/Y', strtotime($value['birthday'])) : '' }}</td>
                                <td>{{ $value['department'] }}</td>
                                <td>{{ $value['part'] }}</td>
                                <td>{{ $value['branch'] }}</td>
                                <td>{{ $value['address'] }}</td>
                                <td>
                                    <a href="{{ route(ADMIN_USER_EDIT, $value['id']) }}"
                                       class="btn btn-success border-0 btn-topic-custom btn-accept-topic-student mb-4 text-white"
                                       data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i
                                            class="fa fa-edit"></i></a>
                                    <button class="delete-user btn btn-danger border-0 btn-topic-custom" data-toggle="modal" data-target="#modal-delete" data-id="{{ $value['id'] }}">
                                        <a class="text-white" data-toggle="tooltip" data-placement="top" title="Xoá">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center text-danger"> Không có dữ liệu</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="group-end d-flex mt-3 justify-content-between">
            @if($listUser->total() > 0)
                <span>{{ $listUser->firstItem() }} ~ {{ $listUser->lastItem() }} / {{ $listUser->total() }} bản ghi</span>
            @endif
            {{ $listUser->appends([
                'area_id' => $params['area_id'] ?? '',
                'month' => $params['month'] ?? '',
                'year' => $params['year'] ?? ''])->links('partials.paginate', ['paginator' => $listUser]) }}
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
