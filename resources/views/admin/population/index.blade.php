@extends('layouts.base')

@section('content')
    <div class="container-fluid container-wrapper p0 p30t bg-white">
        <div class="container container-info">
            <div class="head">
                <h1 class="text-center fw-bold">Quản lý dân số</h1>
            </div>

            @include('partials/flash_messages')
            <div class="content">
                <div class="row">
                    <div class="col-6 offset-6 m15b text-right">
                        <a href="" class="btn btn-primary">
                            Thêm dữ liệu
                        </a>
                    </div>
                </div>

                <div class="content-wrapper" style="background-color: white;">
                    <table class="table table-bordered table-striped border-0 m0">
                        <thead>
                        <tr>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
