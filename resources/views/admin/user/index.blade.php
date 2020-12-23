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
                <div class="content-wrapper" style="background-color: white;">
                        <table class="table table-bordered table-striped border-0 m0">
                            <thead>
                            <tr>
                                <td class="w-4">STT</td>
                                <td>Ảnh</td>
                                <td>Email</td>
                                <td>Họ tên</td>
                                <td>Giới tính</td>
                                <td>Ngày sinh</td>
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
                                        <img src="{{ asset( PATH_AVATAR_USER . $value['avatar'] )  }}" alt="" style="object-fit: cover; width: 40px; height: 40px">
                                    </div>
                                </td>
                                <td>{{ $value['email'] }}</td>
                                <td>{{ $value['name'] }}</td>
                                <td>{{ GENDER_NAME[$value['gender']] }}</td>
                                <td>{{ date('d/m/Y', strtotime($value['birthday'])) }}</td>
                                <td>{{ $value['address'] }}</td>
                                <td>{{ date('d/m/Y', strtotime($value['created_at'])) }}</td>
                                <td></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center"> Không có dữ liệu</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
