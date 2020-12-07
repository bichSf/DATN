@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Quản lý đợt khảo sát</h1>
    </div>
    <div class="display-highcharts m30t">
        @include('partials/flash_messages')
        <div class="row m0 m30b">
            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="row m0" style="justify-content: flex-end">
                    <div class="text-right m10l">
                        <a href="/create" class="btn btn-success">
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
