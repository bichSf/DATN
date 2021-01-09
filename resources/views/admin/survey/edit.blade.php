@extends('layouts.base')
@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Sửa dữ liệu</h1>
    </div>
    <div class="display-highcharts m30t">
        <form action="{{ route(ADMIN_SURVEY_UPDATE, $survey->id) }}" method="POST">
            @csrf
            <div class="row m0">
                <div class="col-12 bg-white" style="padding: 30px;">
                    <div class="content-wrapper" style="background-color: white;">
                        <div class="row m0 m30b">
                            <label class="col-2" for="">Tên khảo sát <span class="text-danger">&nbsp;*</span></label>
                            <div class="col-8">
                                <input type="text" name="name" class="form-control @error('name') input-error @enderror"
                                       style="width: 500px;" placeholder="Tên đợt khảo sát" value="{{ old('name', $survey->name) }}">
                                @error('name')<div class="m5t"></div><span class="text-danger" data-error="name">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row m0 m30b">
                            <label class="col-2" for="">Miền <span class="text-danger">&nbsp;*</span></label>
                            <div class="col-8">
                                <select name="area_id" class="form-control @error('year') input-error @enderror"
                                        style="width: 200px;">
                                    @foreach(AREAS as $key => $value)
                                        <option value="{{ $key }}" {{ old('area_id', $survey->area_id)== $key ? 'selected' : ''  }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('area_id')<div class="m5t"></div><span class="text-danger" data-error="area_id">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row m0 m30b">
                            <label class="col-2" for="">Năm <span class="text-danger">&nbsp;*</span></label>
                            <div class="col-8">
                                <select name="year" class="form-control @error('year') input-error @enderror"
                                        style="width: 200px;">
                                    @foreach(dateYear() as $key => $year)
                                        <option value="{{ $year }}" {{ old('year', $survey->year)== $year ? 'selected' : ''  }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('year')<div class="m5t"></div><span class="text-danger" data-error="year">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row m0 m30b">
                            <label class="col-2" for="">Tháng <span class="text-danger">&nbsp;*</span></label>
                            <div class="col-8">
                                <select name="month" id="" class="form-control @error('month') input-error @enderror"
                                        style="width: 200px;">
                                    @for($month=1; $month<=12; $month++)
                                        <option value="{{ $month }}" {{ old('month', $survey->month)== $month ? 'selected' : ''  }}>{{ $month }}</option>
                                    @endfor
                                </select>
                                @error('month')<div class="m5t"></div><span class="text-danger" data-error="month">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m0 p30t" style="justify-content: flex-end">
                <div class="text-right">
                    <button type="submit" class="btn custom-btn-success fs15 btn-submit-summary btn-submit" style="min-width: 100px">Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection
